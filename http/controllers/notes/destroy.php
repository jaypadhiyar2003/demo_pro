<?php

use core\App;
use core\Database;

global $serv;
$db = App::resolve(Database::class); //database configured 
$heading = "Note Detail";
$id = $_POST['id'];
$query = "SELECT * FROM posts WHERE id = :id";
$note = $db->query_Sta($query, [
    ':id' => $id
])->fetch();
authorize($note['user_id'] != $_SESSION['user']['uid']);

//Form is submited delete the current note
$query = "DELETE FROM posts WHERE id = :id";
$note = $db->query_Sta($query, [
    ':id' => $id
]);

header("location: {$serv}/notes");
exit();
