<?php
    namespace App\Controllers;
    use App\Request;
    use App\Controller;
    use App\View;
    use App\Registry;
    use App\Database;
    use App\Session;

    class CatalogoController extends Controller {
      
        function __construct($session,$request)
        {
            parent::__construct($session,$request);
            
         
        }
        function index(){

            $array_session = [
                $this->session->get_session('id')
            ];

            $db = Registry::get('database');
            $books = $db->selectAll('book');


            $selectSub = Registry::get('database')->SelectWhereId('subscription',$array_session[0]);

            if(count($selectSub)==0){

                echo View::render('catalogo',['books'=>$books,'selectSub'=>null]);

            }else{
                echo View::render('catalogo',['books'=>$books,'selectSub'=>$selectSub]);
            }


            

            


        


            
        }

       
    }