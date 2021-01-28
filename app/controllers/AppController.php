<?php

class AppController
{
    protected $routes = [
                            'home'=>'HomeController',
                            'user'=>'UserController',
                            'products'=>'ProductsController',
                            'signup'=>'SignupController',
                            'login'=>'LoginController',
                            'checkout'=>'CheckoutController',
                            'logout'=>'LogoutController',
                            'contact'=>'ContactController',
                            'about'=>'AboutController',
                            'admin'=>'AdminController'
                        ];

    public function __construct(){
        $this->init();
    }

    public function init(){

        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else $page = 'home';

        if(array_key_exists($page, $this->routes)){
            $className = $this->routes[$page];
        }
        else $className = $this->routes['home'];

        new $className;
    }

    public function render($myPage, $myData){
        $template = file_get_contents($myPage);

        preg_match_all('[{{\w+}}]', $template, $matches);
        
        foreach ($matches[0] as $value) {
            $placeholder = str_replace('{{',"",$value);
            $placeholder = str_replace('}}',"",$placeholder);
            if(array_key_exists($placeholder, $myData)){
                $template = str_replace($value, $myData[$placeholder], $template);
            }
        }
        return $template;
    }

    public function arrayAsTable($unArray)
    {
    $myTable = '';
    if(!is_array($unArray)){
        return ("Wrong data!");
        die();
    }
    $myTable .= "<table class='table table-striped table-sm'><tr>";
    foreach ($unArray[0] as $key => $value) {
        $myTable .= "<th>$key</th>";
    }
    foreach ($unArray as $key => $record) {
        $myTable .= "<tr>";
        foreach ($record as $coloana => $valoare) {
            $myTable .= "<td>$valoare</td>";
        }
        $myTable .= "</tr>";
    }
    $myTable .= "</table>";
    return $myTable;
    }

}