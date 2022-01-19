<?php

class Utils
{
    public static function prettyLog($logContent)
    {
        echo '<pre>' . print_r($logContent, true) . '</pre>';
    }
}
