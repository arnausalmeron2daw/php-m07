<?php
    namespace App\Controllers;
    use App\Request;
    use App\Controller;
    use App\View;
    use App\Registry;
    use App\Database;
    use App\Session;
    class ProfileController extends Controller {
        function __construct($session,$request)
        {
            parent::__construct($session,$request); 
        }
        function index(){
            
        $array_session = [
            $this->session->get_session('id'),
            $this->session->get_session('name'),
            $this->session->get_session('email'),
            $this->session->get_session('password')
        ];

        echo View::render('profile',['array_session'=>$array_session]);
            
            
        }
        
    }

