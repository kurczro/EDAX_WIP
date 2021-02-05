<?php

class ContactController extends AppController
{
    public function __construct(){
        $this->init();
    }
    public function init(){
        // echo __CLASS__;
        $data['pTitle'] = 'EDAX System';
        $data['userAuth'] = "Salut";
        session_start();
        if(isset($_SESSION['authOK'])){
            $data['userAuth'] .= ', '.$_SESSION['authOK'].'!';
            // datele din users sub formă de tabel
            $users = new CartiModel;
            $data['mainContent'] = $this->arrayAsTable($users->showCarti());
            echo $this->render(APP_PATH.VIEWS."LayoutViewAuth.html", $data);
        } else echo $this->render(APP_PATH.VIEWS."LayoutView.html", $data);
    }
}

?>