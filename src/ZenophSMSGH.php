<?php

namespace ZenophSmsGh\Sms;

use Exception;

 //   use Zenoph\ZenophSMSGH\Enums;

    class ZenophSMSGH
    {
        
        public function sendNonPersonalizedSms(string $username, string $password, string $senderId, string $message, string $contacts)
        {
            try{
                // URL for sending message.
                $smsurl = "http://api.smsonlinegh.com/sendsms.php";
                // account login
                $user = urlencode($username);
                // account password
                $password = urlencode($password);
                // the message to send
                $message = urlencode($message);
                // ID to show sender of message.
                $sender = urlencode($senderId);
                // message type to send. Set it to 0 (Text)
                $type = 0;
                // destination numbers. Each must be separated by a comma "0289348779,0581068534,0239597999"
                $destination = $contacts;
                // set the parameter string.
                $params="user={$user}&password={$password}&message={$message}".
                "&type={$type}&sender={$sender}&destination={$destination}";
                // send the message and show the response.
                $liveurl = "{$smsurl}?{$params}";
                readfile($liveurl);
            } 
            catch (Exception $ex) {
                $errmessage = $ex->getMessage();
                return $errmessage;
            }
        
        }

        public function sendPersonalizedSms(string $username, string $password, string $senderId, string $message, array $contacts)
        {
            try{
                define ('VALSEP', '__@');
                define ('RECPTSEP', '__#');
                $smsurl = "http://api.smsonlinegh.com/sendsms.php";
                $user = urlencode($username);
                $password = urlencode($password);
                $sender = urlencode($senderId);
                $type = 0;
                $message = urlencode($message);
                $destination = "";
                $valuestr = "";
                foreach ($contacts as $contact)
                {
                    $destination .= (!empty($destination) ? ",":"").$contact['phone'];
                    $valuestr .= (!empty($valuestr) ? constant('RECPTSEP') :"").$contact['name'].constant('VALSEP').$contact['balance'];
                }
                $valuestr = urlencode($valuestr);
                $params = "user={$user}&password={$password}&message={$message}&type={$type}&sender={$sender}&destination={$destination}&values={$valuestr}";
                $liveurl = "{$smsurl}?{$params}";
                readfile($liveurl);
            }         
            catch (Exception $ex) {
                $errmessage = $ex->getMessage();
                return $errmessage;
            }
        
        }

        public function sendFlashSms(string $username, string $password, string $senderId, string $message, string $contacts)
        {
            try{
                // URL for sending message.
                $smsurl = "http://api.smsonlinegh.com/sendsms.php";
                // account login
                $user = urlencode($username);
                // account password
                $password = urlencode($password);
                // the message to send
                $message = urlencode($message);
                // ID to show sender of message.
                $sender = urlencode($senderId);
                // message type to send. Set it to 0 (Text)
                $type = 2;
                // destination numbers. Each must be separated by a comma "0289348779,0581068534,0239597999"
                $destination = $contacts;
                // set the parameter string.
                $params="user={$user}&password={$password}&message={$message}".
                "&type={$type}&sender={$sender}&destination={$destination}";
                // send the message and show the response.
                $liveurl = "{$smsurl}?{$params}";
                readfile($liveurl);
            } 
            catch (Exception $ex) {
                $errmessage = $ex->getMessage();
                return $errmessage;
            }
        
        }


        public function getBalance($username, $password)
        {
            try{
                //URL for sending message.
                $smsurl = "http://api.smsonlinegh.com/balance.php";
                // account login
                $user = urlencode($username);
                // account password
                $password = urlencode($password);
                // set the parameter string.
                $params="user={$user}&password={$password}";
                // send the message and show the response.
                $liveurl = "{$smsurl}?{$params}";
                readfile($liveurl);
            } 
            catch (Exception $ex) {
                $errmessage = $ex->getMessage();
                return $errmessage;
            }
        
        }


    }

    
