<?php

class AboutController extends AppController
{
    public function __construct(){
        $this->init();
    }
    public function init(){
        // echo __CLASS__;
        $data['pTitle'] = 'Edax System';
        session_start();
        if(isset($_SESSION['authOK'])){
            $data['userAuth'] .= ', '.$_SESSION['authOK'].'!';
            echo $this->render(APP_PATH.VIEWS."LayoutViewAuth.html", $data);
        } else echo $this->render(APP_PATH.VIEWS."LayoutView.html", $data);
    }
}