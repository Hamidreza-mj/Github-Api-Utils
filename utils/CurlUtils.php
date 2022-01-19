<?php

class CurlUtils
{

    public static function callApi($url, $username, $pass = '')
    {
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, $username . ':' . $pass);
        $output = curl_exec($curl);

        $result = json_decode($output, true);
        self::getCurlError($curl);
        curl_close($curl);
        return $result;
    }

    private static function getCurlError($curl)
    {
        $errorNo = curl_errno($curl);
        $errorMsg = curl_strerror($errorNo);

        if ($errorNo === 0) //curl call has no error 
            return;

        echo $errorMsg;
    }
}
