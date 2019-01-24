<?php
    class Helpers {
        public static function getActive($page='home', $menu) {
            if ($page == $menu) {
                return 'active';
            } else {
                return '';
            }
        }
    }
?>