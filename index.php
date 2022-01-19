<?php

require_once __DIR__ . '/config.php';

$usernameAuth = Config::USERNAME;
$passAuth = Config::PASSWORD;

$baseUrl = "https://api.github.com/users/$usernameAuth/";
$followingUrl = "${baseUrl}following";
$followersUrl = "${baseUrl}followers";

getFollowers($followersUrl, $usernameAuth, $passAuth);

function getFollowers($url, $username, $pass)
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, $username . ':' . $pass);

    $output = curl_exec($curl);

    $info = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    $result = json_decode($output);

    curl_close($curl);

    echo '<pre>' . print_r($result, true) . '</pre>';
}

function getFollowing($url, $username, $pass)
{
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, $username . ':' . $pass);

    $output = curl_exec($curl);

    $info = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $result = json_decode($output);

    curl_close($curl);

    echo '<pre>' . print_r($result, true) . '</pre>';
}

function getCurlError($curl)
{
    $errorNo = curl_errno($curl);
    echo curl_strerror($errorNo);
}
