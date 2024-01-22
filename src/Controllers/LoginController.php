<?php
    namespace App\Controllers;
    use App\Request;
    use App\Controller;
    use App\View;
    use App\Registry;
    use App\Session;
    class LoginController extends Controller {
      
        function __construct($session,$request)
        {
            parent::__construct($session,$request);
            
         
        }
        function index(){

            echo View::render('login');
        }


        function log(){

            if (isset($_POST['email'])&&!empty($_POST['email'])
            &&isset($_POST['password'])&&!empty($_POST['password']))
            {
                $email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
                $pass=filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
            
                $email_very = Registry::get('database')->selectWhereEmail('user',$email);
                $user_very = $email_very[0]->name;
                $id = $email_very[0]->id;
                
                
                if($email_very[0]->email == $email && password_verify($pass,$email_very[0]->password)){

                    $this->session->set_session('id',$id);
                    $this->session->set_session('name',$user_very);
                    $this->session->set_session('email',$email);
                    $this->session->set_session('password',$pass);
                    
                    header('Location:/catalogo');

                }else{
                    header('Location:/');
                }


                
            
            }
        }

        function logout(){
            $session = new Session();
            $session->destroy();
            header('Location: /');
        }

        
       
    }