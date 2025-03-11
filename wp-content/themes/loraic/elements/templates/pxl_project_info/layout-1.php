<div class="pxl-project-info1">
    <?php if(!empty($settings['title'])) : ?>
        <h5 class="pxl-item--title">
            <?php echo esc_attr($settings['title']); ?>
        </h5>
    <?php endif; ?>
    <?php if(isset($settings['items']) && !empty($settings['items']) && count($settings['items'])): ?>
        <?php foreach ($settings['items'] as $key => $value):
            $label = isset($value['label']) ? $value['label'] : '';
            $content = isset($value['content']) ? $value['content'] : ''; ?>
            <div class="pxl--item">
                <?php if(!empty($label)) : ?>
                    <label class="pxl-pr-10"><?php echo esc_attr($label); ?></label>
                <?php endif; ?>

                <?php if(!empty($content)) : ?>
                    <span><?php echo pxl_print_html($content); ?></span>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>