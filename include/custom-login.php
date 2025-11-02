<?php

class CustomLogin
{
    /**
     * The custom login slug, retrieved from the database.
     */
    private $new_login_slug;

    public function __construct()
    {
        // retrieve the saved slug from database, use 'login' as a safe default
        $this->new_login_slug = get_option('abuhasdha_login_slug', 'login');

        // add hooks for the settings page
        if (is_admin()) {
            add_action('admin_menu', array($this, 'add_settings_page'));
            add_action('admin_init', array($this, 'setup_settings_fields'));
        }

        // stop if the slug is empty
        if (empty($this->new_login_slug)) {
            return;
        }

        // add the login url functionality hooks only when not in admin and not a cron job
        if (!is_admin() && !wp_doing_cron()) {
            add_action('init', array($this, 'add_login_rewrite_rule'));
            add_action('template_redirect', array($this, 'redirect_old_login_page'));
            add_action('login_init', array($this, 'redirect_old_login_page'));
            add_action('login_init', array($this, 'override_login_form_action'));
            add_action('init', array($this, 'override_logout_redirect'));

            add_filter('login_url', array($this, 'filter_login_url'), 10, 3);
            add_filter('logout_url', array($this, 'filter_logout_url'), 10, 2);
            add_filter('register_url', array($this, 'filter_register_url'));
            add_filter('lostpassword_url', array($this, 'filter_lostpassword_url'));
            add_filter('wp_redirect', array($this, 'filter_failed_login_redirect'), 10, 2);
        }
    }

    public function override_login_form_action()
    {
        add_filter('login_form_middle', function ($content) {
            ob_start();
?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const form = document.getElementById('loginform');
                    if (form) {
                        form.action = "<?= esc_url(home_url('/' . $this->new_login_slug)); ?>";
                    }
                });
            </script>
        <?php
            return $content . ob_get_clean();
        });
    }

    // add the rewrite rule to recognize the new login url
    public function add_login_rewrite_rule()
    {
        add_rewrite_rule('^' . $this->new_login_slug . '/?$', 'wp-login.php', 'top');
    }

    // redirect direct access to the old wp-login.php to a 404 page
    public function redirect_old_login_page()
    {
        if (strpos($_SERVER['REQUEST_URI'], 'wp-login.php') !== false && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $allowed_actions = ['postpass', 'logout', 'rp', 'resetpass', 'lostpassword'];
            $action = $_GET['action'] ?? '';

            if (!in_array($action, $allowed_actions, true)) {
                $this->render_404();
            }
        }
    }

    // filter the default login url to use the new slug
    public function filter_login_url($login_url, $redirect, $force_reauth)
    {
        $parsed = wp_parse_url($login_url);
        $new_url = home_url('/' . $this->new_login_slug . '/');
        if (!empty($parsed['query'])) {
            $new_url .= '?' . $parsed['query'];
        }
        return $new_url;
    }

    // filter the default logout url
    public function filter_logout_url($logout_url, $redirect)
    {
        return str_replace('wp-login.php', $this->new_login_slug, $logout_url);
    }

    // override logout redirect url
    public function override_logout_redirect()
    {
        add_action('wp_logout', function () {
            $slug = get_option('abuhasdha_login_slug', 'portal');
            wp_safe_redirect(home_url("/{$slug}?loggedout=true"));
            exit;
        });
    }

    // filter the default registration url
    public function filter_register_url($register_url)
    {
        return str_replace('wp-login.php', $this->new_login_slug, $register_url);
    }

    // filter the default lost password url
    public function filter_lostpassword_url($lostpassword_url)
    {
        return str_replace('wp-login.php', $this->new_login_slug, $lostpassword_url);
    }

    // filter the redirect url on a failed login attempt
    public function filter_failed_login_redirect($location, $status)
    {
        if (strpos($location, 'wp-login.php') !== false && strpos($location, 'failed') !== false) {
            $location = str_replace('wp-login.php', $this->new_login_slug, $location);
        }
        return $location;
    }

    // add the settings page under the "Settings" menu in the dashboard
    public function add_settings_page()
    {
        add_options_page(
            'Custom Login URL',
            'Custom Login URL',
            'manage_options',
            'abuhasdha-login-settings',
            array($this, 'render_settings_page')
        );
    }

    // register the setting, section, and field using the Settings API
    public function setup_settings_fields()
    {
        // register our setting so WordPress can save it
        register_setting(
            'abuhasdha_login_options_group',
            'abuhasdha_login_slug',
            array($this, 'sanitize_login_slug')
        );

        // add a settings section
        add_settings_section(
            'abuhasdha_login_section',
            'Custom Login URL Settings',
            null,
            'abuhasdha-login-settings'
        );

        // add the input field for the slug
        add_settings_field(
            'abuhasdha_login_slug_field',
            'Login URL Slug',
            array($this, 'render_slug_field'),
            'abuhasdha-login-settings',
            'abuhasdha_login_section'
        );

        flush_rewrite_rules(true);
    }

    // sanitize the user input and flush rewrite rules on save
    public function sanitize_login_slug($input)
    {
        $sanitized_input = sanitize_title_with_dashes($input);

        $this->add_login_rewrite_rule();
        flush_rewrite_rules(true);

        return $sanitized_input;
    }

    // render the HTML for the input field
    public function render_slug_field()
    {
        $login_slug = get_option('abuhasdha_login_slug', 'login');
        echo '<input type="text" name="abuhasdha_login_slug" value="' . esc_attr($login_slug) . '" placeholder="e.g., portal, secret-login, etc.">';
        echo '<p class="description">Enter the new slug for your login page. Use only letters, numbers, and hyphens.</p>';
    }

    // render the main settings page HTML
    public function render_settings_page()
    {
?>
        <div class="wrap">
            <form action="options.php" method="post">
                <?php
                settings_fields('abuhasdha_login_options_group');
                do_settings_sections('abuhasdha-login-settings');
                submit_button('Save Changes');
                ?>
            </form>
        </div>
<?php
    }

    // function to render 404 error
    private function render_404()
    {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
        nocache_headers();
        include get_query_template('404');
        exit;
    }
}

add_action('after_setup_theme', function () {
    new CustomLogin();
    flush_rewrite_rules(true);
});

add_action('init', function () {
    $slug = get_option('abuhasdha_login_slug', 'login');
    add_rewrite_rule("^{$slug}/?$", 'wp-login.php', 'top');
    flush_rewrite_rules(true);
});
