<?php
namespace libs;

use models\UserModel;

class FileHelper
{
    static public function uploadFile($uploadDir, $formName)
    {
        if ($_FILES[$formName]['type'] == 'text/xml') {
            $temp = $_FILES[$formName]['name'];
            $uploadfile = $uploadDir . $temp;
            move_uploaded_file($_FILES[$formName]['tmp_name'], $uploadfile);
        } else {
            echo 'Incorrect file type. You can upload only XML-files';
        }
    }

    public function parseXmlFile($path, $fileName)
    {
        $addUser = new UserModel();
        $hash = new Hashing();
        if (isset($_POST['import_btn'])) {

            $hash->setSalt(SALT);
            $pathToXmlFile = $path . $fileName . '.xml';
            $xmlFile = simplexml_load_file($pathToXmlFile);

            foreach ($xmlFile->userData as $values) {
                $hashedPassword = $hash->hash($values->password);
                $addUser->addUser(['email' => $values->email, 'user_name' => $values->user_name, 'password' => $hashedPassword]);
            }
        }
    }

}