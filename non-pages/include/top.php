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
        
        $split_url = explode('/', $path_parts['dirname']);  //split string at each / character (creates array)
        $containing_folder = $split_url[count($split_url) -1]; //IMPORTANT this gets the folder that the current file resides in. Used almost everywhere to tell what page I'm on since all my pages are called 'index.php'
            
        $debug = false;  //Localhost says error if not define here, hope it doesn't hurt
        if ($debug) {
            print "<p>Domain" . $domain;
            print "<p>php Self" . $phpSelf;
            print "<p>Path Parts<pre>";
            print_r($path_parts);
            print "</pre>";
        }        

        //link to the correct files for the main page. I use pathparts['dirname'] to make sure I know what folder contains the file
        print '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> <!-- font-awesome style on all pages -->';
        if ($containing_folder == "assignment5.0") {
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
        if ($containing_folder == "gallery") { //link to specific javascript files for gallery to work
            print "\n".'<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script> <!-- link galleria script. Doesn\'t work without jQuery -->'."\n";
            print '<script src="non-pages/galleria/galleria-1.4.2.min.js"></script>'."\n";
            print "<!-- run galleria -->
	<script>
		Galleria.loadTheme('non-pages/galleria/themes/classic/galleria.classic.min.js'); //important MUST CHANGE PATH
		Galleria.configure({ transition: 'fade', transitionSpeed: 2000 }); //2000 milliseconds= 2 second
		Galleria.run('.galleria', {
		autoplay: 5000 
		}); //Time in milliseconds, so it changes every 5 seconds - Noah
	</script>\n
<!-- end galleria section -->";
        }

//****************************************************************
        // Noah's new code to print a page-specific title based on what file is in the URL, instead of having 1 global title for all pages
        if ($containing_folder == "assignment5.0") {
            print "<title>Home - Sleek Panther Productions</title> \n\t\t";
        } elseif ($containing_folder == "services") {
            print "<title>Services - Sleek Panther Productions</title> \n\t\t";
        } elseif ($containing_folder == "gallery") {
            print "<title>Gallery - Sleek Panther Productions</title> \n\t\t";
        } elseif ($containing_folder == "positions") {
            print "<title>Positions - Sleek Panther Productions</title> \n\t\t";
        } elseif ($containing_folder == "about") {
            print "<title>About - Sleek Panther Productions</title> \n\t\t";
        } elseif ($containing_folder == "contact") {
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
            if ($containing_folder == 'assignment5.0') {    //I have to print the id home because id's can't have periods in them 
                print '<body id="home">';
            }
            else {      //on all other pages, simply print the containing folder for id
                print '<body id="' . $containing_folder. '">';
            }
            //print '<body id="' . $path_parts['filename'] . '">';
            
            if ($containing_folder == "assignment5.0") {
                include ("non-pages/include/header.php");
                include ("non-pages/include/nav.php");
            }
            else {
                include ("../non-pages/include/header.php");
                include ("../non-pages/include/nav.php");
            }
//            if ($path_parts['dirname'] == "/cs008/assignment5.0") {
//                include ("non-pages/include/header.php");
//                include ("non-pages/include/nav.php");
//            }
//            else {
//                include ("../non-pages/include/header.php");
//                include ("../non-pages/include/nav.php");
//            }
    ?>