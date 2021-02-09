<?php

    /**
     * There are some pages that require some extra credentials in order to block bots and make sure the 
     * page is being used by a human.
     * 
     * Try removing the Line 13 and/or Line 18
     * The amazon page will automatically ask for some kind a human confirmation, that could be a problem 
     */
    $url = 'https://www.amazon.com';
    $ch = CURL_INIT();
    CURL_SETOPT($ch, CURLOPT_URL, $url);
    CURL_SETOPT($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:42.0) Gecko/20100101 Firefox/42.0');
    CURL_SETOPT($ch, CURLOPT_POST, false);
    CURL_SETOPT($ch, CURLOPT_PROXYTYPE,CURLPROXY_SOCKS5);
    CURL_SETOPT($ch, CURLOPT_RETURNTRANSFER,True);
    CURL_SETOPT($ch, CURLOPT_FOLLOWLOCATION,True);
    CURL_SETOPT($ch, CURLOPT_ENCODING, 'gzip, deflate');
    CURL_SETOPT($ch, CURLOPT_CONNECTTIMEOUT,30);
    CURL_SETOPT($ch, CURLOPT_TIMEOUT,30); 
    echo $result = CURL_EXEC($ch);
          
?>