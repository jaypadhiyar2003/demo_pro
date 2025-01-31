<?php
use core\App;
use core\Database;

$heading="Edit this note ";
$id =$_GET['id'];
//dd($_GET['id']);

$db = App::resolve(Database::class); //database configured 
$query = "SELECT * FROM posts WHERE id = :id";
$note = $db->query_Sta($query, [
    ':id' => $id
])->fetch();
authorize($note['user_id'] != $_SESSION['user']['uid']);

require 'views/notes/edit.view.php';