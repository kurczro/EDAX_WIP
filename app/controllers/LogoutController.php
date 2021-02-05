<?php

class LogoutController extends AppController
{
    public function __construct(){
        $this->init();
    }
    public function init(){
        $data['pTitle'] = 'EDAX System';
        session_start();

        $_SESSION = array();
        session_destroy();
        echo $this->render(APP_PATH.VIEWS."LayoutViewAuth.html", $data);
    }
}

?>