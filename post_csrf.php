<?php
    /**
     * Line 36 Customized Header
     * Sometimes there is also data that can only be accessed after logged in but with some 
     * specific inside token or session token or something that would be inside somewhere in the page.
     * Check the ajax request for all the fields and also check the X-Requested-With on the network area of 
     * the developer's tools 
     * 
     * In my case I found this when I was extracting some Chart data from a webpage after login
     * 
     * If there is a token, it must be somewhere inside the page, just need to find.
     * The method used to find any token is shown on login_csrf.php It could even be the same token as 
     * before.
     * 
     */

    $token ='Example';
    
    $url = 'https://example.com/user-after-login/chart';

    $data = array(
        "orderId" => '1',
        "productId" => '1',
        "timezoneOffset" => "-540"
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
    CURL_SETOPT($ch, CURLOPT_HTTPHEADER,array("x-csrf-token: $token","X-Requested-With: XMLHttpRequest"));//This is the autentication along with cookie.txt
    $result = CURL_EXEC($ch);
?>                  