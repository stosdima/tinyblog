<?php
try {
    $db= DBconnection::getConnection();
    $sql ="CREATE table messages(
     ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
     Title VARCHAR( 50 ) NOT NULL,
     Text VARCHAR( 250 ) NOT NULL);" ;
    $db->exec($sql);
} catch(PDOException $e) {
    echo $e->getMessage();
}