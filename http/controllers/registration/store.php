<?php

use core\Validator;
use core\App;
use core\Authenticator;
use core\Database;
use core\Session;

global $serv;
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
//validate the form inputs
if(!Validator::email($email))
{
    $errors['email'] = "Please provide a valid email address.";
}

if(!Validator::string_check($password,min:6,max:10)){
    $errors['password'] = "Please provide a valid password of minimum 6 character.";
} 

if(!empty($errors)){
    $heading = "Registation Page ";
    require 'views/registration/create.view.php';
    exit();
}

//check if the account already exits

$db = App::resolve(Database::class);
$query = 'SELECT * FROM users WHERE email = :email';
$user = $db->query_Sta($query,[
    ':email' => $email
])->fetch();
//if yes,redirect to a home page.
if($user){
    redirect('/');
}
//if not ,save one to the database , and then log the user in and redirect
else{
    $query = "INSERT INTO users(email,password) VALUES(:email,:password)";
    $db->query_Sta($query,[
        ':email'=> $email,
        ':password'=>password_hash($password,PASSWORD_BCRYPT)//it will hash the password before it store in database
    ]);
    //mark as log  up
    //(new Authenticator)->login(['email'=>$email]);
    Session::put('register',1);
    redirect('/session');
}
    