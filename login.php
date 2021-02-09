<?php    
    /**
     * Normally used for logging in some online page. But could also be used for 
     * post request
     * POST fields below. It would change depending on the fields
     */
    $url ='https://example.com/login';
    $data = array(
        "pwd"=>'yourpwd',
        "email"=>'email@gmail.com',
        "otherfield-1"=>'something'
    );
    CURL_SETOPT($ch, CURLOPT_URL, $url );
    CURL_SETOPT($ch, CURLOPT_POST, true);
    CURL_SETOPT($ch, CURLOPT_PROXYTYPE,CURLPROXY_SOCKS5);
    CURL_SETOPT($ch, CURLOPT_POSTFIELDS, $data); 
    CURL_SETOPT($ch, CURLOPT_RETURNTRANSFER,True);
    CURL_SETOPT($ch, CURLOPT_FOLLOWLOCATION,True);
    CURL_SETOPT($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) ."cookie.txt");
    CURL_SETOPT($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) ."cookie.txt");
    CURL_SETOPT($ch, CURLOPT_FOLLOWLOCATION, true);
    CURL_SETOPT($ch, CURLOPT_CONNECTTIMEOUT,30);
    CURL_SETOPT($ch, CURLOPT_TIMEOUT,30); 
    $result = CURL_EXEC($ch);

?>