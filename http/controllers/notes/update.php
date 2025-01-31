<?php

use core\App;
use core\Database;
use core\Validator;
global $serv;
$heading = "Edit this note ";
//find the corresponding note
$id = $_POST['id'];
$title = $_POST['body'];
$db = App::resolve(Database::class); //database configured 
$errors = [];
$query = "SELECT * FROM posts WHERE id = :id";
$note = $db->query_Sta($query, [
    ':id' => $id
])->fetch();

authorize($note['user_id'] != $_SESSION['user']['uid']);
//validate the form
if (! Validator::string_check($title, 1, 10)) {
    $errors['body'] = 'A body is empty or Notes Length is higher then 1000 Characteres.';
}

if (!empty($errors)) {
    //validation
    require 'views/notes/edit.view.php';
    exit();
}
//if no validation error then update the record in the notes db table
else{
    $query = "UPDATE posts SET title = :title WHERE id = :id";
    $db->query_Sta($query, [
        ':title' => $title,
        ':id' => $id
    ]);
    //redirect the user
    header("location: {$serv}/notes");
    exit();
}

