<?php

class HomeController extends AppController
{
    public function __construct(){
        $this->init();
    }
    public function init(){
        $data['pTitle'] = 'Edax System';
        $data['userAuth'] = "";
        session_start();
        if(isset($_SESSION['authOK'])){
            $data['userAuth'] .= ', '.$_SESSION['authOK'].'!';

            echo $this->render(APP_PATH.VIEWS."LayoutViewAuth.html", $data);
        } else echo $this->render(APP_PATH.VIEWS."LayoutView.html", $data);
    }
}