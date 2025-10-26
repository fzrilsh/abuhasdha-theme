<?php

add_action('acf/input/admin_footer', function() { ?>
    <script>
        jQuery(document).ready(function($) {
            const fieldWrapper = $('[data-name="images"]')
            const field = fieldWrapper.find('input')
            const button = $('<a href="#" class="button add-gallery">Add Images</a>')
            const preview = $('<div class="acf-gallery-preview" style="margin-top:10px; display:flex; flex-wrap:wrap; gap:10px;"></div>')

            field.after(button)
            button.after(preview)
            field.hide()

            function renderPreview() {
                preview.empty()
                const ids = field.val().split(',').filter(Boolean)

                ids.forEach(id => {
                    wp.media.attachment(id).fetch().then(() => {
                        const url = wp.media.attachment(id).attributes.sizes?.thumbnail?.url 
                            || wp.media.attachment(id).attributes.url
                        const img = $(`
                            <div data-id="${id}" style="position:relative; width:100px;">
                                <img src="${url}" style="width:100%; height:auto; border-radius:4px; border:1px solid #ccc;" />
                                <button type="button" class="remove-image" 
                                    style="position:absolute; top:2px; right:2px; background:red; color:#fff; border:none; border-radius:50%; width:20px; height:20px; cursor:pointer;">×</button>
                            </div>
                        `);
                        preview.append(img)
                    });
                });
            }
            renderPreview();

            let frame
            button.on('click', function(e) {
                e.preventDefault()
                if (frame) frame.close()

                frame = wp.media({
                    title: 'Select Images',
                    button: { text: 'Use these images' },
                    multiple: true
                })

                frame.on('select', function() {
                    const selection = frame.state().get('selection')
                    const ids = field.val().split(',').filter(Boolean)

                    selection.map(attachment => {
                        const id = attachment.id
                        if (!ids.includes(String(id))) ids.push(id)
                    });

                    field.val(ids.join(','))
                    renderPreview()
                });

                frame.open()
            });

            preview.on('click', '.remove-image', function() {
                const id = $(this).parent().data('id')
                const ids = field.val().split(',').filter(Boolean)
                const newIds = ids.filter(i => i != id)
                field.val(newIds.join(','))
                renderPreview()
            })
        })
    </script>
<?php });