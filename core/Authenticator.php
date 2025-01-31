<?php

namespace core;

class Authenticator
{

    public function login($user)
    {
        $_SESSION['user'] = ['email' => $user['email'],'uid'=> $user['uid']];
        session_regenerate_id(true); //delete old session and generate new session id
    }

    public function logout()
    {
        Session::destroy(); //$_SESSION = [];
    }
    public function attempt($email, $password)
    {
        $query = 'SELECT * FROM users WHERE email = :email';
        $user = App::resolve(Database::class)->query_Sta($query, [
            ':email' => $email,
        ])->fetch();
        if ($user) {
            //if yes,then log the user in and redirect to home
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email,
                    'uid' => $user['id']
                ]);
                return true;
            }
        }
        return false;
    }
}
