<?php

use core\Validator;
use core\Database;
use core\App;

$db = App::resolve(Database::class);
global $serv;
$heading = "Create a New Note ";
$errors = [];

$body = $_POST['body'];
if (! Validator::string_check($body, 1, 100)) {
    $errors['body'] = 'A body is empty or Notes Length is higher then 1000 Characteres.';
}
if (!empty($errors)) {
    //validation
    require 'views/notes/create.view.php';
    exit();
}
else{
$query = "INSERT INTO posts(title,user_id) VALUES(:body,:user_id)";
$db->query_Sta($query, [
    ':body' => $body,
    ':user_id' => $_SESSION['user']['uid']
]);

header("location: {$serv}/notes");
exit();

}
