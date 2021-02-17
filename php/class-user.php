<?php
    class Six_User {
            
        public function __construct() {
            if (!is_admin()) {
                
            }
        }

        // Add rest route
        public function add_rest_route() {
            // Endpoint: https://www.six-degrees.com/wp-json/user/data
            register_rest_route('user', 'data', array(
                'methods'  => array('POST', 'GET'),
                'callback' => 'Six_User::get_user_data_as_json'
            ));
        }

        // Return user data by IP address
        public function get_user_request() {
            $ip = $_SERVER['REMOTE_ADDR'];
            $geo = json_decode(file_get_contents('http://www.geoplugin.net/json.gp?ip=' . $ip));
            $data = array(
                'ip' => $ip,
                'city' => $geo->geoplugin_city,
                'state' => $geo->geoplugin_regionName,
                'country' => $geo->geoplugin_countryName,
                'continent' => $geo->geoplugin_continentName,
                'latitude' => $geo->geoplugin_latitude,
                'longitude' => $geo->geoplugin_longitude
            );
            return $data;
        }

        // Return json format of user data
        public function get_user_data_as_json() {
            return wp_send_json(Six_User::get_user_request());
        }
    }