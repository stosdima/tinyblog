<?php

class LoginController
{
    public function actionLogin()
    {

        $logg = new \libs\LoggedUser();
        $view = new \libs\View();
        $selectLoginAndPass = new \models\UserModel();
        $hashPassAndLogin = new \libs\Hashing();
        $cookie = new \libs\Cookie();
        $message = new \libs\Message();
        $verificationHash = new \libs\DBModel();
        if (empty($_COOKIE['UserName'])) {
            if (isset($_POST['login_send_btn'])) {
                if ( $_POST['log_user_name'] !== '' || $_POST['log_password'] !== '') {
                    $hashPassAndLogin->setSalt(SALT);
                    $hashLogin = $hashPassAndLogin->hash($_POST['log_user_name']);
                    $existingInDb = $verificationHash->select('verification_table', array('verification_code'), 'verification_code = :code', array(':code' => $hashLogin));
                    if (empty($existingInDb) || $hashLogin !== $existingInDb[0]['verification_code']) {
                        $hash = $hashPassAndLogin->hash($_POST['log_password']);
                        try {
                            $userData = $selectLoginAndPass->selectUser(array('user_name', 'password'), 'user_name = :name AND password = :pass', array(':name' => $_POST['log_user_name'], ':pass' => $hash));

                            if (count($userData) > 0) {
                                $cookie->create('user_name', $_POST['log_user_name'], 3600);
                                $message->sendMessage('Thanks');
                            } else {
                                $message->sendMessage('user doesnt exist');
                            }
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }

                    } else {
                        $message->sendMessage('Please, confirm verification code');
                    }
                }else {
                    $message->sendMessage('Please, input log or pass');
                }
            }
            $view->render('login');
        } else {
            $logg->actionLogg();
        }
    }
}