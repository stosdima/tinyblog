<?php
require('config.php');
require('Autoloader/autoload.php');
Autoloader\Autoload::autoloadRegister();
$view = new libs\View();

$router = new libs\Router();
$router->run();

$cookie = new libs\Cookie();

$dbModel = new \libs\DBModel();
//$dbModel->add('users', array('UserName'=>'dimassaasdasd', 'Password'=>'dasdfccacxcxcs'));
//$dbModel->select('users',array('UserName'), 1);
$dbModel->delete('users',array('UserName'));