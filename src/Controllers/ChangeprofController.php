<?php
    namespace App\Controllers;
    use App\Request;
    use App\Controller;
    use App\View;
    use App\Registry;
    use App\Database;

    class ChangeprofController extends Controller {
        function __construct($session,$request)
        {
            parent::__construct($session,$request); 
        }
        function index(){
            
            $array_session = [
                $this->session->get_session('name'),
                $this->session->get_session('email'),
                $this->session->get_session('password')
            ];


    
            echo View::render('changeprof',['array_session'=>$array_session]);
            
            
        }

        function updateprof(){

            $array_session = [
                $this->session->get_session('id'),
                $this->session->get_session('name'),
                $this->session->get_session('email'),
                $this->session->get_session('password')
            ];

            if(isset($_POST['name'])  && isset($_POST['email']) && isset($_POST['password'])){

            $array_prof = [];

              foreach($_POST as $a=>$valor){
                if($valor != ""){
                    $array_prof = array_merge($array_prof,[$a=>$valor]);
                    
                }

            }

            

            

                $user_new = Registry::get('database')->update('user',$array_prof,$array_session[0]);

                

                $select = Registry::get('database')->SelectUserId('user',$array_session[0]);
              

                    $this->session->set_session('name',$select[0]->name);
                    $this->session->set_session('email',$select[0]->email);
                    $this->session->set_session('password',$select[0]->password);





                header('Location:/profile');
                
                

               
                      
        
            
        }
    }
}



