<?php
    namespace App\Controllers;
    use App\Request;
    use App\Controller;
    use App\View;
    class SubscriptionController extends Controller {
        function __construct($session,$request)
        {
            parent::__construct($session,$request); 
        }
        function index(){
           

            //$users=Registry::get('database')->selectAll('users');

        echo View::render('subscription');
            
            
        }
        
    }