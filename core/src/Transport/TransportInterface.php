<?php
namespace app\Transport;
 interface TransportInterface{
     public function send($subject,$messsage,$template);
 }