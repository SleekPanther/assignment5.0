<?php
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//performs a few security checks
function securityCheck($form = false) { //$form = false initializes value to false, (not required), so if called without an argument, it assumes it's false
    
    $status = true; // start off thinking everything is good until a test fails
    $debug = false;  //I initialize debug here so it actual works |qwer
    // when it is a form page check to make sure it submitted to itself
    if ($form) {
        // globals defined in top.php
        global $yourURL;
        //$fromPage = htmlentities($_SERVER['HTTP_REFERER'], ENT_QUOTES, "UTF-8");  //bob's originial sample didn't include filename for some reason
        
        //I had to recreate the domain again since I didn't want to mess with passing more argument to this function. It's basically duplicated in top.php
        $domain = "http://";     //commenting out next 5 lines didn't work
        if (isset($_SERVER['HTTPS'])) {   //OLD WAY, DIDN'T USE
            if ($_SERVER['HTTPS']) {
                $domain = "https://";
            }
        }
        $server = htmlentities($_SERVER['SERVER_NAME'], ENT_QUOTES, "UTF-8");
        $domain .= $server;
        
        $fromPage = $domain . htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8"); //I also changed this because it wasn't 
        if ($debug)
            print "<p>From: " . $fromPage . " should match your Url: " . $yourURL;
        if ($fromPage != $yourURL) {
            $status = false;
        }
    }
    return $status; // hard code to "return false;" to see if the function works
}
?>