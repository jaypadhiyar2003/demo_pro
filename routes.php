<?php

$router->get('/', 'home.php');
$router->get("/about",'about.php');
$router->get("/notes",'notes/index.php')->only('auth');
$router->get("/notes/create",'notes/create.php');
$router->get("/note",'notes/show.php');
$router->get("/note/edit",'notes/edit.php');
$router->patch("/note",'notes/update.php');
$router->post("/notes",'notes/store.php');
$router->delete('/note','notes/destroy.php');
$router->get("/contact",'contact.php');

$router->get("/register",'registration/create.php')->only('guest');
$router->post("/register",'registration/store.php')->only('guest');
$router->get("/session",'session/create.php')->only('guest');
$router->post("/session",'session/store.php')->only('guest');
$router->delete("/session",'session/destroy.php')->only('auth');