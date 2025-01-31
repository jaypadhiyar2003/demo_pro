<?php
use core\App;
use core\Database;
$heading="My Notes";
$db = App::resolve(Database::class);
$query= "SELECT * FROM posts WHERE user_id = :user_id";
$id =1;
$notes = $db->query_Sta($query,[':user_id' => $_SESSION['user']['uid']])->fetchAll();

require 'views/notes/index.view.php';