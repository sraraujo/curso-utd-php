<?php

    class Config{

        public static $projeto = "stock-POO";

        public static function urlBase(){
            return "http://".$_SERVER["SERVER_NAME"]."/".self::$projeto;
        }
        
        public static function pathBase(){
            return $_SERVER["DOCUMENT_ROOT"]."/".self::$projeto;
        }

    }

?>