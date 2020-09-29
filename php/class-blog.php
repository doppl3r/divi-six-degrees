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
                    $post = Six_Blog::get_random_post_by_category('Branding');
                    $featured = Six_Blog::get_featured_post_html($post);
                    array_splice($lines, $index, 0, array($featured)); // Insert separator HTML
                    $new_content = implode("\n", $lines); // Convert array back to string
                }
            }

            // Return new content value
            return $new_content;
        }

        public static function get_random_post_by_category($category_name = '') {
            // Get category term_id
            $categories = get_categories();
            $name = '';
            $term_id = 0;

            // Loop through all possible categories for term id
            foreach ($categories as $category) {
                $name = $category->name;
                $term_id = $category->term_id;
                if ($category_name == $name) break;
            }
            
            // Return random post
            $posts = get_posts(
                array(
                    'numberposts'   => -1,
                    'category'      => $term_id,
                    'orderby'       => 'rand',
                    'order'         => 'DESC'
                )
            );
            return $posts[0]; // Return first random post
        }

        public static function get_featured_post_html($post) {
            // Load CSS if post is requested
            wp_enqueue_style('featured-post');

            // Popular featured post data
            $thumbnail = get_the_post_thumbnail_url($post->ID, 'medium');
            $title = $post->post_title;
            $content = substr(wp_strip_all_tags($post->post_content, true), 0, 150);
            $link = get_post_permalink($post->ID);
            $html = '
                <div class="featured-post row" data-comment="Generated by child theme: class-blog.php">
                    <div class="col">
                        <div class="thumbnail" style="background-image: url(' . $thumbnail . ');"></div>
                    </div>
                    <div class="col">
                        <h5>' . $title . '</h5>
                        <p>' . $content . '...</p>
                        <a href="' . $link . '">Read more</a>
                    </div>
                </div>
            ';
            return $html;
        }
    }
?>