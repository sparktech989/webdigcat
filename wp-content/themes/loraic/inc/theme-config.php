<?php if(!function_exists('loraic_configs')){
    function loraic_configs($value){
        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'loraic'), 
                    'value' => loraic()->get_opt('primary_color', '#FF7D44')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'loraic'), 
                    'value' => loraic()->get_opt('secondary_color', '#1C3F39')
                ],
                'third'   => [
                    'title' => esc_html__('Third Color', 'loraic'), 
                    'value' => loraic()->get_opt('third_color', '#505D7B')
                ],
                'four'   => [
                    'title' => esc_html__('Four Color', 'loraic'), 
                    'value' => loraic()->get_opt('four_color', '#07847F')
                ],
            ],
            'link' => [
                'color' => loraic()->get_opt('link_color', ['regular' => '#1C3F39'])['regular'],
                'color-hover'   => loraic()->get_opt('link_color', ['hover' => '#FF7D44'])['hover'],
                'color-active'  => loraic()->get_opt('link_color', ['active' => '#FF7D44'])['active'],
            ],
            'gradient' => [
                'color-from' => loraic()->get_page_opt('gradient_color', ['from' => '#001eff'])['from'],
                'color-to' => loraic()->get_page_opt('gradient_color', ['to' => '#ff0048'])['to'],
            ],
               
        ];
        return $configs[$value];
    }
}
if(!function_exists('loraic_inline_styles')) {
    function loraic_inline_styles() {  
        
        $theme_colors      = loraic_configs('theme_colors');
        $link_color        = loraic_configs('link');
        $gradient_color    = loraic_configs('gradient');
        ob_start();
        echo ':root{';
            
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  loraic_hex_rgb($value['value']));
            }
            foreach ($link_color as $color => $value) {
                printf('--link-%1$s: %2$s;', $color, $value);
            }
            foreach ($gradient_color as $color => $value) {
                printf('--gradient-%1$s: %2$s;', $color, $value);
            }
        echo '}';

        return ob_get_clean();
         
    }
}
 