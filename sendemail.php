<?php
    require 'vendor/autoload.php';    

    class SendEmail{
        public static function SendMail($to, $subject, $content){
            $key = 'A71DF7615826BC968DC5A12F6D3D205D046FB1D2DBEA6CD66A0CB03D54EBCAF0F5EFD73C850619D42706D59FFCE1CB39';
            $url = 'https://api.elasticemail.com/v2/email/send';

            try {

                $email = array('from' => 'richards.dwayne1@gmail.com',
                'fromName' => 'It Confrence',
                'apikey' => $key,
                'subject' => $subject,
                'to' => $to,
                'bodyHtml' => $content,
                'bodyText' => $content,
                'isTransactional' => false);
                
                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $email,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER => false,
                    CURLOPT_SSL_VERIFYPEER => false
                ));
                
                $result=curl_exec ($ch);
                curl_close ($ch);
                
                //echo $result;

            } catch (Exception $e) {
                echo 'Email exception Caught : ' . $e->getMessage() . "\n";
                return false;
            }
        }
    }
?>