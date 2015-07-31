<?php
class LoginController
{
    public function actionLogin()
    {
        if (isset($_COOKIE['user'])) {
            echo "You are logged";
        } else {
            include_once 'views/loginForm.php';
            if (isset($_POST['enter_btn'])) {
                include('db/selectFromTable.php');
                if (selectFromTable($_POST['loginUserName'], $_POST['loginPassword'])) {
                    Cookie::setCookie('user',$_POST['loginUserName']);
                    echo "Welcome to the site";
                } else echo "User not found";

            }
        }
    }
}
