<?php
/**
 * Created by PhpStorm.
 * User: tiagocardoso
 * Date: 28/12/15
 * Time: 21:12
 */

namespace CodeProject\OAuth;


use Auth;

class PasswordVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email' => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}