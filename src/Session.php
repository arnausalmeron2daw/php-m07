<?php

    namespace App;

    class Session{
        protected $id;
        function __construct()
        {
            session_start();
            $this->id=session_id();
        }

        function set_session($session_name,$session_value){

            $_SESSION[$session_name] = $session_value;

        }

        function get_session($session_name){

            $session = $_SESSION[$session_name];

            return $session;
        }

        function destroy(){

            session_destroy();
        }
    }