<?php

if (!function_exists('url_encrypt')) {
    function url_encrypt($string)
    {
        $encrypt_method = 'AES-256-CBC';
        $secret_key = 'ZwZSUU50OW2doUTXNHSUNYaGZOWUwQ0c3Z2doUwQ0cNYUU3ZUT09SNHX5wZSUaG9';
        $secret_iv = 'Zw0c3Z2d0OW2doUTXNoUwQ0cNYUU3ZUT09SU5HSUUwQUaG9NYaGNHX5wZSZSUZOWZw0c3Z2d5wZSZSUZOWoUwQ0cN0OWYUU3ZUT09SU5HSUUwQUaG2doUTXN9NYaGNHX';

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        return base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
    }
}

if (!function_exists('url_decrypt')) {
    function url_decrypt($enc_string)
    {
        $encrypt_method = 'AES-256-CBC';
        $secret_key = 'ZwZSUU50OW2doUTXNHSUNYaGZOWUwQ0c3Z2doUwQ0cNYUU3ZUT09SNHX5wZSUaG9';
        $secret_iv = 'Zw0c3Z2d0OW2doUTXNoUwQ0cNYUU3ZUT09SU5HSUUwQUaG9NYaGNHX5wZSZSUZOWZw0c3Z2d5wZSZSUZOWoUwQ0cN0OWYUU3ZUT09SU5HSUUwQUaG2doUTXN9NYaGNHX';

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        return openssl_decrypt(base64_decode($enc_string), $encrypt_method, $key, 0, $iv);
    }
}

if (!function_exists('is_nav_active')) {
    function is_nav_active($path, $level = 1, $active = 'active')
    {
        $url = explode('/', Request::path());
        return isset($url[$level-1]) && $url[$level - 1] == $path ? $active : '';
    }
}