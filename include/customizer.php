<?php

foreach (glob(get_template_directory() . '/include/customizer/*.php') as $file) {
    require_once $file;
}