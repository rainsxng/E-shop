<?php


namespace app\Transport;
use app\Transport\TransportInterface;
include_once 'TransportInterface.php';
require_once '..\..\vendor\autoload.php';
class TransportMailer implements TransportInterface
{
    private $config;
    public function __construct()
    {
        $this->config = require_once __DIR__.'/config/mailConfig.php';
    }
    public function send($subject, $messsage)
    {
        $transport = (new \Swift_SmtpTransport($this->config['host'],$this->config['port']))
            ->setUsername($this->config['username'])
            ->setPassword($this->config['password'])
            ->setEncryption($this->config['encryption']);
        ;

// Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

// Create a message
        $message = (new \Swift_Message($subject))
            ->setFrom([$this->config['username'] => $this->config['username']])
            ->setTo([$this->config['username'] => $this->config['username']])
            ->setBody($messsage);
        ;

// Send the message
        $result = $mailer->send($message);
    }
}