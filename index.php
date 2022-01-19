<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/utils/CurlUtils.php';
require_once __DIR__ . '/utils/Utils.php';

$usernameAuth = Config::USERNAME;
$passAuth = Config::PASSWORD;
$baseUrl = "https://api.github.com/users/$usernameAuth/";

$following = getFollowing();
$followers = getFollowers();

$diff = array_diff($followers, $following);
if (empty($diff))
    echo "they are same";


Utils::prettyLog($a);

function getFollowing()
{
    global $usernameAuth, $baseUrl;
    $followingUrl = "${baseUrl}following";
    return CurlUtils::callApi($followingUrl, $usernameAuth, '');
}

function getFollowers()
{
    global $usernameAuth, $baseUrl;
    $followersUrl = "${baseUrl}followers";
    return CurlUtils::callApi($followersUrl, $usernameAuth, '');
}
