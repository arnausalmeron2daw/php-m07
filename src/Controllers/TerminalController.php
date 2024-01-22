<?php
    namespace App\Controllers;
    use App\Request;
    use App\Controller;
    use App\View;
    use App\Registry;
    use App\Database;
    use DateTime;
    use DateInterval;
    class TerminalController extends Controller {
        function __construct($session,$request)
        {
            parent::__construct($session,$request); 
        }
        function index(){
           
            //$users=Registry::get('database')->selectAll('users');

        echo View::render('terminal');
            
            
        }

        function payment(){
            
            if(isset($_POST['cardnum'])  and isset($_POST['expiration']) and isset($_POST['csv'])){

                $array_session = [
                    $this->session->get_session('id'),
                ];

            
            $select = Registry::get('database')->SelectUserId('user',$array_session[0]);

            $date = new DateTime();

            $actual_date = $date->format('Y-m-d');
            $original_date = $actual_date;
            $intervalo = new DateInterval('P30D');

            $end_date = $date->add($intervalo);
            $final_date = $end_date->format('Y-m-d');

            $sel = Registry::get('database')->selectWhereId('subscription',$array_session[0]);

            if(count($sel) == 0){
                $subscription = Registry::get('database')->addsubs($array_session[0],$actual_date,$final_date);
                echo View::render('catalogo');
            }else{
                echo "Este usuario ya esta subscrito";
            }
               
            

            
                
                

               
                      
        
            }else{
                header('Location:/terminal');
            }
        }

        
        
    }