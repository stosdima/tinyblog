<?php

class LoginController
{
    public function actionLogin()
    {
        $logg = new \libs\LoggedUser();
        $view = new \libs\View();
        $selectLoginAndPass = new \models\UserModel();
        $hashPass = new \libs\Hashing();
        $cookie = new \libs\Cookie();
        if (empty($_COOKIE['UserName'])) {
            $view->render('login');
            if (isset($_POST['login_send_btn'])) {
                $hashPass->setSalt('942c916c16bf1f03dc157290d30d6312');
                $hash = $hashPass->hash($_POST['log_password']);
                try {
                    $login = $selectLoginAndPass->selectUser(array('UserName' => $_POST['log_user_name']));
                    $pass = $selectLoginAndPass->selectUser(array('Password' => $hash), 1);
                    if (isset($login) && isset($pass)) {
                        if ($login['UserName'] == $_POST['log_user_name'] && $pass['Password'] == $hash) {
                            $cookie->create('UserName', $_POST['log_user_name']);
                        }else echo 'Incorrect data';
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        } else {
            $logg->actionLogg();
        }
    }
}