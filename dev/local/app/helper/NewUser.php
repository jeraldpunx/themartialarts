<?php
namespace app\helper;

class NewUser
{
    protected $newUser;
    protected $token;
    protected $userType;
    protected $url;


    public function __construct()
    {

    }

    public function create($newUser,$userType)
    {
        $this->newUser = $newUser;
        $this->userType = $userType;
        $this->sendEmail();
    }

    public function sendEmail()
    {
//        dd($this->newUser->email);
        $email = $this->newUser->email;
        Mail::send('emails.caregiversetprimary', $this->messageBody(), function($message) use($email)
        {
            $message->to($email, 'username')->subject('my subject');
        });
    }

    private function messageBody()
    {

        return 'Welcome to the new martial arts university!
            you can now set your '. $this->userType .'account details
        ';
    }

    private function getToken()
    {
        $this->token = str_random(16);
    }

    public function sayHello($user = 'person')
    {
        dd('hello');
    }
    public function queueMessage()
    {

    }

    private function saveUrl()
    {
        $this->url = URL::to('').''.$this->getToken().'';
    }



}
