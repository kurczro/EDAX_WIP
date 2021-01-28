<?php

class LoginController extends AppController
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
            if($newUser->checkUser($userName,$userPass)){
                session_start();
                $_SESSION['authOK'] = $userName;

                echo $this->render(APP_PATH.VIEWS."LayoutViewAuth.html", $data);

            }else echo $this->render(APP_PATH.VIEWS."LoginView.html", $data);
            
        }else echo $this->render(APP_PATH.VIEWS."LoginView.html", $data);
    }
}