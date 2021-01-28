<?php

class CheckoutController extends AppController
{
    public function __construct(){
        $this->init();
    }
    public function init(){
        $data['pTitle'] = 'EDAX System';
        $data['userAuth'] = "";
        session_start();
        if(isset($_SESSION['authOK'])){
            $data['userAuth'] .= ', '.$_SESSION['authOK'].'!';
            echo $this->render(APP_PATH.VIEWS."CheckoutView.html", $data);
        } else echo $this->render(APP_PATH.VIEWS."CheckoutView.html", $data);
    }
}