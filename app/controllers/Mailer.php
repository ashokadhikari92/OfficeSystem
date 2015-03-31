<?php

class Mailer {

    public function sendTo($email, $subject, $view, $data = array())
    {
        \Mail::queue($view, $data, function($message) use($email, $subject)
        {
            $message->to($email)
                ->subject($subject);
        });
        return "Mail has been sent";

    }

    public function welcome($user)
    {
        $subject = "Account Registration Confirmation";
        $data['userId'] = $user->id;
        $data['activationCode'] = $user->getActivationCode();
        $data['email'] = $user->email;
        $view = 'mails.welcome';
        return $this->sendTo($user->email,$subject,$view,$data);
    }

    public function forgotPassword($user,$password)
    {

        $subject = "Password Reset Confirmation";
        $view = 'mails.reset';
        $data['userId'] = $user->id;
        $data['resetCode'] = $user->getResetPasswordCode();
        $data['email'] = $user->email;
        $data['password'] = $password;

        return $this->sendTo($user->email, $subject, $view, $data );
    }

    public function newPassword($email, $newPassword)
    {
        $subject = "New Password Information";
        $view = 'mails.newpassword';
        $data['newPassword'] = $newPassword;
        $data['email'] = $email;

        return $this->sendTo($email, $subject, $view, $data );
    }
}