<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Noah Patullo">
        <meta name="description" content="Sleek Panther Productions is a generic business with grand aspirations but no specific goals. We encourage you sign up for our mailing list to stay in the loop.">
        <meta name="robots" content="index, follow">
        <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/sin/trunk/html5.js"></script>
        <![endif]-->
        
        <!-- Mobile Specific Meta for skeleton to work-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php
        //Magical code to display errors
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        
        // %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
        //
        // PATH SETUP
        //
        //  $domain = "https://www.uvm.edu" or http://www.uvm.edu;
        $domain = "http://";     //commenting out next 5 lines didn't work
        if (isset($_SERVER['HTTPS'])) {   //OLD WAY, DIDN'T USE
            if ($_SERVER['HTTPS']) {
                $domain = "https://";
            }
        }
        
        $server = htmlentities($_SERVER['SERVER_NAME'], ENT_QUOTES, "UTF-8");
        
        $domain .= $server;

        $phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");     // parse the url into htmlentites to remove any suspicous vales that someone may try to pass in. htmlentites helps avoid security issues. //## $_SERVER['PHP_SELF'] returns full path and extension, htmlentities() just converts special character
        
        $path_parts = pathinfo($phpSelf);
        $debug = false;  //Localhost says error if not define here, hope it doesn't hurt
        if ($debug) {
            print "<p>Domain" . $domain;
            print "<p>php Self" . $phpSelf;
            print "<p>Path Parts<pre>";
            print_r($path_parts);
            print "</pre>";
        }        
        
        if ($path_parts['dirname'] == "/cs008/assignment5.0") {
            print ' <!-- CSS For Skeleton–––––––––––––––––––––––––––––––––––––––––––––––––– -->'."\n";
            print '<link rel="stylesheet" href="non-pages/skeleton-2.0.4/css/normalize.css">'."\n";
            print '<link rel="stylesheet" href="non-pages/skeleton-2.0.4/css/skeleton.css">'."\n";
            print '<!-- My css -->';
            print '<link rel="stylesheet" href="non-pages/css/my-skeleton-styles.css">'."\n";
            print '<link rel="stylesheet" href="non-pages/css/main-styles.css">'."\n";

            print '<!-- Favicon––––––––––––––––––––––––––––––––––––––––––––––– -->'."\n";
            print '<link rel="icon" type="image/png" href="images/0components/favicon.png">'."\n";
        }
        else {  //if it's page other than the home page, it will be 1 directory down, so all links have to go up 1 directory 1st
            print ' <!-- CSS For Skeleton–––––––––––––––––––––––––––––––––––––––––––––––––– -->'."\n";
            print '<link rel="stylesheet" href="../non-pages/skeleton-2.0.4/css/normalize.css">'."\n";
            print '<link rel="stylesheet" href="../non-pages/skeleton-2.0.4/css/skeleton.css">'."\n";
            print '<!-- My css -->';
            print '<link rel="stylesheet" href="../non-pages/css/my-skeleton-styles.css">'."\n";
            print '<link rel="stylesheet" href="../non-pages/css/main-styles.css">'."\n";

            print '<!-- Favicon––––––––––––––––––––––––––––––––––––––––––––––– -->'."\n";
            print '<link rel="icon" type="image/png" href="../images/0components/favicon.png">'."\n";
        }

//****************************************************************
        // Noah's new code to print a page-specific title based on what file is in the URL, instead of having 1 global title for all pages
        if ($path_parts['dirname'] == "/cs008/assignment5.0") {
            print "<title>Home - Sleek Panther Productions</title> \n\t\t";
        } elseif ($path_parts['dirname'] == "/cs008/assignment5.0/services") {
            print "<title>Services - Sleek Panther Productions</title> \n\t\t";
        } elseif ($path_parts['dirname'] == "/cs008/assignment5.0/gallery") {
            print "<title>Gallery - Sleek Panther Productions</title> \n\t\t";
        } elseif ($path_parts['dirname'] == "/cs008/assignment5.0/positions") {
            print "<title>Positions - Sleek Panther Productions</title> \n\t\t";
        } elseif ($path_parts['dirname'] == "/cs008/assignment5.0/about") {
            print "<title>About - Sleek Panther Productions</title> \n\t\t";
        } elseif ($path_parts['dirname'] == "/cs008/assignment5.0/contact") {
            print "<title>Contact - Sleek Panther Productions</title> \n\t\t";
        } else {
            print "<title>Sleek Panther Productions</title> \n\t\t";        //If somehow there's an extra page not taken account of, it will just print a default title
        }
        
        // %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
        //
        // inlcude all libraries
//        require_once('lib/security.php');
//        
//        if ($path_parts['filename'] == "form") {
//            include "lib/validation-functions.php";
//            include "lib/mail-message.php";
//        }
        ?>
        
    </head>
    <!-- ################ body section ######################### -->

    <?php
// giving each body tag an id really helps with css later on
    //## access just the 'filename' portion of the path array
            print '<body id="' . $path_parts['filename'] . '">';
            
            if ($path_parts['dirname'] == "/cs008/assignment5.0") {
                include ("non-pages/include/header.php");
                include ("non-pages/include/nav.php");
            }
            else {
                include ("../non-pages/include/header.php");
                include ("../non-pages/include/nav.php");
            }
    ?>