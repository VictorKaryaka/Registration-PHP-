<?php

namespace application;

class Validator
{
    public function isLoginOrPasswordValid($value)
    {
        $reg_exp = '/^[0-9a-zA-Z]{5,20}$/';
        return (preg_match($reg_exp, $value)) ? true : false;
    }

    public function isPhoneValid($phone)
    {
        $reg_exp_array = array(
            '/^\([0-9]{3}\)\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$/',
            '/^[0-9]{3}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$/',
            '/^\+38\s\([0-9]{3}\)\s[0-9]{3}-[0-9]{2}-[0-9]{2}$/'
        );

        foreach ($reg_exp_array as $key => $value) {
            if (preg_match($value, $phone)) {
                return true;
            }
        }
        return false;
    }

    public function isInviteValid($invite)
    {
        $reg_exp = '/^\d{6}$/';
        return (preg_match($reg_exp, $invite)) ? true : false;
    }
}