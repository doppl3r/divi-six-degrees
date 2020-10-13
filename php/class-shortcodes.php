<?php
    class Six_Shortcodes {
        
        public function __construct() {
            if (!is_admin()) {
                
            }
        }

        public function add_shortcode() {
            add_shortcode('six', 'Six_Shortcodes::update_shortcode');
        }

        public function update_shortcode($atts, $content = null) {
            $data = $atts['data'];
            $output = '';
            
            if ($data == 'popup') {
                // Enqueue popup libraries
                wp_enqueue_style('popup');
                wp_enqueue_script('popup');

                // Pass target javascript variable
                $target = $atts['target'];
                wp_localize_script('popup', 'popupTarget', $target);
            }

            // Return output value (default empty)
            return $output;
        }
    }
?>