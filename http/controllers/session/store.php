<?php
use core\Authenticator;
use http\forms\LoginForm;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);
if (!$signedIn) {
    $form->error('email', "No matching account found for that email and password .")->throw();
    return redirect('/session');
}
redirect('/');
