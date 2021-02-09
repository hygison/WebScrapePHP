<?php    
    /**
     * Login in a website protected with "csrf Token" or any other type of token present on the page
     * csrf is an unique code that would update eachtime the page is reloaded, 
     * but the token must be passed to login page to confirm that is not a machine =)
     * 
     * Consider the login requires a POST request:
     * 1 - Login by the website and findout the POST fields required
     * 2 - Get the csrf token or any other page token
     * 3 - Get session cookies and store on cookie.txt file
     * 4 - Insert the required data and show the cookies saved that correspond with the csrf
     */
    
    $url = 'https://example.com/login';
    $ch = CURL_INIT($url);
    CURL_SETOPT($ch, CURLOPT_RETURNTRANSFER, true);
    CURL_SETOPT($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) .'cookie.txt');
    $response = CURL_EXEC($ch);
    
    $dom = new DOMDocument;
    $dom->loadHTML($response);

    /**
     * Get the Token from the page. Each page would have a different method to find the token.
     * It is expected to be in some input, but the name or the id could be different.
     */
    $tags = $dom ->getElementsByTagName('input');
    for($i = 0; $i < $tags->length; $i++){
        $grab = $tags->item($i);
        if($grab->getAttribute('name') === '_csrf'){
            $token = $grab->getAttribute('value');
        }  
    }

    /**
     * POST fields. It would change depending on the fields
     */
    $data = array(
        "_csrf" => $token,
        "pwd"=>'123123',
        "email"=>'email@gmail.com',
        "otherfield-1"=>'something',
        "otherfield-2"=>'stuff'
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