<?php
    namespace App\Controllers;
    use App\Request;
    use App\Controller;
    use App\View;
    use App\Registry;
    use App\Database;

    class RegisterController extends Controller {
      
        function __construct($session,$request)
        {
            parent::__construct($session,$request);
            
         
        }
        function index(){

            echo View::render('register');
        }

        

        function reg(){

            if(isset($_POST['name'])  && isset($_POST['email']) && isset($_POST['password'])){


                $name=$_POST['name'];               
                $email=$_POST['email'];
                $email_very = Registry::get('database')->selectWhereEmail('user',$email);
                
                if($email_very[0]->email == $email){
                    echo "Este usuario ya existe ";
                }else{
                    $password= password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $user = Registry::get('database')->adduser($name,$email,$password);
                    header('Location:/');
                }
                

               
                      
        
            }else{
                header('Location:/register');
            }
        }
       
    }