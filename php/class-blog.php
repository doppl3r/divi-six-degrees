<?php
    class Six_Blog {
        
        public function __construct() {
            if (!is_admin()) {
                
            }
        }

        public function update_content($content) {
            return $content;
        }
    }
?>