<?php
    class Six_Blog {
        
        public function __construct() {
            if (!is_admin()) {
                
            }
        }

        public function update_content($content) {
            $new_content = $content;
            $post_type = get_post_type();
            
            // Check if current post type is a blog entry
            if ($post_type == 'post') {
                $lines = explode("\n", $new_content);
                $total = count($lines);
                $percentage = 30 / 100; // 30% of page
                $index = ceil($total * $percentage);

                // Update content if more than 1 line exists
                if (!empty($lines)) {
                    // TODO: Add clean separator with a random featured blog post
                    $featured = '[a featured blog post would appear here]';
                    array_splice($lines, $index, 0, array($featured)); // Insert separator HTML
                    $new_content = implode("\n", $lines); // Convert array back to string
                }
            }

            // Return new content value
            return $new_content;
        }
    }
?>