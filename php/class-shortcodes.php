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
            $output = '';
            $category = $atts['category'];
            $data = $atts['data'];
            $type = $atts['type'];
            
            if ($data == 'popup') {
                // Enqueue popup libraries
                wp_enqueue_style('popup');
                wp_enqueue_script('popup');

                // Pass target javascript variable
                $target = $atts['target'];
                wp_localize_script('popup', 'popupTarget', $target);
            }
            else if ($data == 'blog') {
                if ($type == 'featured') {
                    if (empty($category)) $category = 'Uncategorized'; // Resolve default if empty
                    $post = Six_Blog::get_random_post_by_category($category);
                    $output .= Six_Blog::get_featured_post_html($post);
                }
            }

            // Return output value (default empty)
            return $output;
        }
    }
?>