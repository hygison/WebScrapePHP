<?php
    
    /**
     * This file would provide with the basic methods to open pages that are only allowed to be open 
     * by users after logging in the WebPage
     * Here it would be necessary to login, save the cookies used and keep them because 
     * you might need to show whenever changing pages
     */

    $url ='https://example.com/login';

    /**
     * Login normally > POST fields. It would change depending on the fields
     */
    $data = array(
        'password'=> '1231232123',
        'email'=> 'example@gmail.com',
        'something else' => 'some other value if exist'
    );
    CURL_SETOPT($ch, CURLOPT_URL, $url);
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



    /**
     * Navigate to the next page inside inside the login area, or User's area
     */
    $new_url = 'https://example.com/user-after-login/something';
    CURL_SETOPT($ch, CURLOPT_URL, $new_url);
    CURL_SETOPT($ch, CURLOPT_POST, false);
    CURL_SETOPT($ch, CURLOPT_RETURNTRANSFER, true);
    $result = CURL_EXEC($ch);

?>                 