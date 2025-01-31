<?php

use core\Database;
use core\App;

global $serv;
$db = App::resolve(Database::class);
$heading = "Note Detail";
//showing the note
$id = $_GET['id'];
$query = "SELECT * FROM posts WHERE id = :id";
$note = $db->query_Sta($query, [
    ':id' => $id
])->fetch();

if (!$note) { // this will true if wronge note id has been passed
    abort();
}
//if condition become true then return forbbidan error page by default . 
//we can change error page by assigning Status code value in method 2nd argument
authorize($note['user_id'] != $_SESSION['user']['uid']);


require 'views/notes/show.view.php';
