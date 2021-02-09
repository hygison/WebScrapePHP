<?php 
    /**
     * CURL using a proxy server
     * Some websites might block your IP if you make too many requests to the server in a 
     * short period of time
     */
    $ip = '185.18.212.227';
    $port = '3128';
    $proxy = $ip.':'.$port;

    /**
     * If your proxy Require user or password
     */
    $user = '';
    $pwd ='';
    $credential = $user.':'.$pwd;

    $url = 'https://example.com';
    

    $ch = CURL_INIT();
    CURL_SETOPT($ch, CURLOPT_URL, $url);
    CURL_SETOPT($ch, CURLOPT_PROXY, $ip);
    CURL_SETOPT($ch, CURLOPT_PROXYPORT, $port);
    //CURL_SETOPT($ch, CURLOPT_PROXY, $proxy);//This one also can be used instead of the 2 lines above
    //CURL_SETOPT($ch, CURLOPT_PROXYUSERPWD, $credential); In case of password is required to access
    CURL_SETOPT($ch, CURLOPT_FOLLOWLOCATION,true);
    CURL_SETOPT($ch, CURLOPT_RETURNTRANSFER, true);
    CURL_SETOPT($ch, CURLOPT_CONNECTTIMEOUT,30);
    CURL_SETOPT($ch, CURLOPT_TIMEOUT,30); 
    $result = CURL_EXEC($ch);

    
    echo $result;
?>