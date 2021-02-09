<?php

    /**
     * To collect information from the page it would be a nice Idea to use simple_html_dom. 
     * This page is just to show how simple_html_dom can be used to collect data
     * 
     * Dom method to easily find and collect data available on the web page, it is necessary to have simple_html_dom
     * The documentation can be found here: https://simplehtmldom.sourceforge.io
     * I am not the author of simple html dom. The lines I wrote here are just me easy use whenever I forget.
     * Those are the lines I used most before
     */

    include 'simple_html_dom.php';

    $url = 'https://example.com';
    CURL_SETOPT($ch, CURLOPT_URL, $url);
    CURL_SETOPT($ch, CURLOPT_POST, false);
    CURL_SETOPT($ch, CURLOPT_RETURNTRANSFER, true);
    $result = CURL_EXEC($ch);


    $html =  new simple_html_dom();
    $html ->load($result);

    /**
     * Any find('something') will return an array
     * If used find('something',0) it will return the first "something"
     */

    $div = $html->find('div');

    $div_with_class = $html->find('div[class="psomething"]');

    $div_with_data_attr = $html->find('div[data-attr]');
    $attr_value = $div_with_data_attr->getAttribute('data-attr');

    $data_attr = $html->find('div[data-attr="0"]',0);

    $txt_only = $html->find('span',0)->plaintext;

    $find_style = $html->find('tr[style="height:100px;"]',0);
?>