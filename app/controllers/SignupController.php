<?php

class SignupController extends AppController
{
    public function __construct(){
        $this->init();
    }
    public function init(){

    $data['pTitle'] = 'Edax System';
    
    if(isset($_REQUEST['user_name_form'])){
        $userName = $_REQUEST['user_name_form'];
        $userPass = $_REQUEST['user_password_form'];
        $newUser = new UsersModel;
        $newUser->addU($userName, $userPass);
            echo $this->render(APP_PATH.VIEWS."LayoutView.html", $data);
        } else echo $this->render(APP_PATH.VIEWS."SignupView.html", $data);
    }
}