        <?php
        include ("../non-pages/include/top.php");
        //%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1 Initialize variables
//
// SECTION: 1a.
// variables for the classroom purposes to help find errors.
        
$debug = false;

if (isset($_GET["debug"])) { // ONLY do this in a classroom environment
    $debug = true;
}

if ($debug)
    print "<p>DEBUG MODE IS ON</p>";

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1b Security
//
// define security variable to be used in SECTION 2a.
$yourURL = $domain . $phpSelf;

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1c form variables
//
// Initialize variables one for each form element
// in the order they appear on the form
$firstName = "";
$middleName= "";
$lastName = "";
$email = "noahpatullo@gmail.com";
$formDevice = "Computer";       //this sets the default select box when the form loads
$productLaunches = true;    // checked
$promotional = false; // not checked
$newPositions = false;  //not checked, but multiple could be checked @ the start
$trafficSource = "Word of mouth";       //This must math text in the php "if($doYouHateForms=="YES I hate forms") print 'checked" to display a default checked value

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1d form error flags
//
// Initialize Error Flags one for each form element we validate.  If you are checking for two errors for an object you only need one "flag". Create an empty array to collect error messages if we have any.
// in the order they appear in section 1c.
$firstNameERROR = false;
$middleNameERROR = false;
$lastNameERROR = false;
$emailERROR = false;
$formDeviceERROR = false;
$productLaunchesERRORS = false;
$promotionalERROR = false;
$newPositionsERROR = false;
$trafficSourceERROR = false;

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1e misc variables
//
// create array to hold error messages filled (if any) in 2d displayed in 3c.
$errorMsg = array();

// array used to hold form values that will be written to a CSV file
$dataRecord = array();

$mailed=false; // have we mailed the information to the user?
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//
// SECTION: 2 Process for when the form is submitted
//
if (isset($_POST["btnSubmit"])) {  //tests to see if the form was submitted, uding the ID of the submit botton

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2a Security
    // 
    if (!securityCheck(true)) {     //if security check returns false, display error message qwer
        $msg = "<p>Sorry you cannot access this page. ";
        $msg.= "Security breach detected and reported</p>";
        die($msg);
    }

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2b Sanitize (clean) data 
    // remove any potential JavaScript or html code from users input on the
    // form. Note it is best to follow the same order as declared in section 1c.

    $firstName = htmlentities($_POST["txtFirstName"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $firstName;
    
    $middleName = htmlentities($_POST["txtMiddleName"], ENT_QUOTES, "UTF-8");
    if ($middleName == ""){         //if middle name is blank, don't add it to csv file, just the blank space for placeholder
        $dataRecord[] = "";
    }
    else {
        $dataRecord[] = $middleName;
    }
    
    $lastName = htmlentities($_POST["txtLastName"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $lastName;

    $email = filter_var($_POST["txtEmail"], FILTER_SANITIZE_EMAIL);
    $dataRecord[] = $email; //I am doing this just after I sanitize the data in SECTION 2b. You would need to do this for every from variable and this array is what we will save to the csv file.
    
    $formDevice = htmlentities($_POST["selFormDevice"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $formDevice;
    
//start checkbox section    
    if (isset($_POST["chkProductLaunches"])) {
        $productLaunches = true;  //line below gets the actual "name" from the  form instead of just 1 or 0 for true/false. Makes csv file more readable
        $dataRecord[] = htmlentities($_POST["chkProductLaunches"], ENT_QUOTES, "UTF-8");     
    } else {
        $productLaunches = false;
        $dataRecord[] = ""; 
    }
    
    if (isset($_POST["chkPromotional"])) {
        $promotional = true;  //line below gets the actual "value" from the  form instead of just 1 or 0 for true/false. Makes csv file more readable
        $dataRecord[] = htmlentities($_POST["chkPromotional"], ENT_QUOTES, "UTF-8");     
    } else {
        $promotional = false;
        $dataRecord[] = ""; 
    }
    
    if (isset($_POST["chkNewPositions"])) {
        $newPositions = true;  //line below gets the actual "value" from the  form instead of just 1 or 0 for true/false. Makes csv file more readable
        $dataRecord[] = htmlentities($_POST["chkNewPositions"], ENT_QUOTES, "UTF-8");     
    } else {
        $newPositions = false;
        $dataRecord[] = ""; 
    }
//end checkbox section
    
    $trafficSource = htmlentities($_POST["radHowDidYouHearAboutUs"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $trafficSource;

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2c Validation
    //
        // Validation section. Check each value for possible errors, empty or
    // not what we expect. You will need an IF block for each element you will
    // check (see above section 1c and 1d). The if blocks should also be in the
    // order that the elements appear on your form so that the error messages
    // will be in the order they appear. errorMsg will be displayed on the form
    // see section 3b. The error flag ($emailERROR) will be used in section 3c.
    
    if ($firstName == "") { //if it's blank
        $errorMsg[] = "Please enter your first name";
        $firstNameERROR = true;
    } elseif (!verifyAlphaNum($firstName)) {    //if there are any special characters
        $errorMsg[] = "Your first name appears to have special characters.";
        $firstNameERROR = true;
    }
    
    if ($middleName != "") { //only verify alphanumeric if they actually entered anything in the box
        if (!verifyAlphaNum($middleName)) {    //if there are any special characters
            $errorMsg[] = "Your middle name appears to have special characters.";
            $middleNameERROR = true;
        }
    }
    
    
    if ($lastName == "") { //if it's blank
        $errorMsg[] = "Please enter your last name";
        $lastNameERROR = true;
    } elseif (!verifyAlphaNum($lastName)) {    //if there are any special characters
        $errorMsg[] = "Your last name appears to have special characters.";
        $lastNameERROR = true;
    }    

    if ($email == "") {     //if the field is blank
        $errorMsg[] = "Please enter your email address";
        $emailERROR = true;
    } elseif (!verifyEmail($email)) {       //calls the verifyEmail function in validation-functions.php
        $errorMsg[] = "Your email address appears to be incorrect.";
        $emailERROR = true;
    }
    
    //validation for $formDevice isn't necessary since I gave a default value
    
    //validation not needed for check boxes
    
    //validation for radio buttons could go here, but I set a default 


    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2d Process Form - Passed Validation
    //
    // Process for when the form passes validation (the errorMsg array is empty)
    //
    if (!$errorMsg) {
        if ($debug)
            print "<p>Form is valid</p>";
        
        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2e Save Data
        //
        // This block saves the data to a CSV file.
        
        $fileExt = ".csv";
        
        $myFileName = "../non-pages/data/registration";
        
        $filename = $myFileName . $fileExt;
        
        if ($debug)
            print "\n\n<p>filename is " . $filename;
        
        // now we just open the file for append
        $file = fopen($filename, 'a');
        
        // write the forms informations
        fputcsv($file, $dataRecord);
        
        // close the file
        fclose($file);        
        
        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2f Create message
        //
        // build a message to display on the screen in section 3a and to mail
        // to the person filling out the form (section 2g).
        
        $message = '<h2>Your information.</h2>';
        
        foreach ($_POST as $key => $value) {
            if ($key != "btnSubmit") {      //Added by Noah, this excludes the submit button from being included in the email message. "btnSubmit" is the name of the submit button
                if (htmlentities($value, ENT_QUOTES, "UTF-8") != ""){  // only print opening paragraph tag if the value ISN'T empty. This is for the optional middle name text field
                    $message .= "<p>";
                }

                $camelCase = preg_split('/(?=[A-Z])/', substr($key, 3));  //remove 1st 3 letters, then split @ a capitol letter (doesn't add space)

                foreach ($camelCase as $one) {
                    if (htmlentities($value, ENT_QUOTES, "UTF-8") != "") { // only split up the "name" attribute if the value ISN'T empty. This is for the optional middle name text field
                        $message .= $one . " ";  //add the split name with a space in between
                    }
                }
                if (htmlentities($value, ENT_QUOTES, "UTF-8") != "") { // only add to the message if the value ISN'T empty. This is for the optional middle name text field
                    $message .= " = " . htmlentities($value, ENT_QUOTES, "UTF-8") . "</p>";     //get the value & add to message
                }
            }
        }
        
        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2g Mail to user
        //
        // Process for mailing a message which contains the forms data
        // the message was built in section 2f.
        $to = $email; // the person who filled out the form
        $cc = "";
        $bcc = "";
        $from = "Noah Patullo <noahpatullo@gmail.com>;"; //$from = "WRONG site <noreply@yoursite.com>";
        
        // subject of mail should make sense to your form
        $todaysDate = strftime("%x");
        $subject = "Sleek Panther Productions Mailing List: " . $todaysDate;
        
        $mailed = sendMail($to, $cc, $bcc, $from, $subject, $message);

    } // end form is valid

} // ends if form was submitted. (All the way back to line 62)

//#############################################################################
//
// SECTION 3 Display Form
?>
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <section class="row">
            <section class="twelve columns box">
              <article class="six columns box" >
                  <h2>How to Reach Us</h2>
                  <p>You can send us mail, thou who really does that anymore it's all digital nowadays.</p>
                  <p>So why not send us an email: <a href='mailto:noah.patullo@uvm.edu' class='italic'>Noah.Patullo@uvm.edu</a></p>
                  <p>Or you can fill out the form below to be added to our mailing lists and stay in the loop. We are trying to collect information about our customers and how they found us to see what's working and what's not</p>
              </article>
              <article class="six columns box">
                  <h3>Directions</h3>
                  <p>1600 Pennsylvania Ave NW<br>Washington, DC<br>20500</p>
                  <iframe id='contact-map' src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d3105.1533072139914!2d-77.03892363397257!3d38.89760937957068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x89b7b7bce1485b19%3A0x9fc7bf09fd5d9daf!2sThe+White+House%2C+1600+Pennsylvania+Ave+NW%2C+Washington%2C+DC+20500!3m2!1d38.8976633!2d-77.0365739!5e0!3m2!1sen!2sus!4v1448379719537" allowfullscreen></iframe>
              </article>
            </section>
        </section>

        <section class="row">
          <section class="twelve columns box">
            <article class="ten columns offset-by-one box " >      
    <?php
    //####################################
    //
    // SECTION 3a.
    //
    // 
    // 
    // 
    // If its the first time coming to the form or there are errors we are going
    // to display the form.
    if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) { // closing of if marked with: end body submit
        if (!$mailed) {
            print '<figure id="failure-image"><img src="../images/contact/failure.png"  alt=""></figure><h1>Your Request has NOT ';
        }
        else{
            print "<figure id='success-image'><img src='../images/contact/success.png'></figure><h1>Your Request has ";
        }
    
        print "been processed</h1>";
        print "<p>A copy of this message has ";
        if (!$mailed) {
            print "NOT ";
        }
        print "been sent</p>";
        print "<p>To: " . $email . "</p>";
        print "<p>Message contents below:</p><br>";
        
        print $message;
        } else {
    
    
        //####################################
        // SECTION 3b Error Messages

        if ($errorMsg) {
            print '<div id="errors">';
            print '<figure id="failure-image"><img src="../images/contact/failure.png"  alt=""></figure>';
            print "<h1>Invalid! Your Errors Are:</h1>";
            print "<ol>\n";
            foreach ($errorMsg as $err) {
                print "<li>" . $err . "</li>\n";
            }
            print "</ol>\n";
            print '</div>';
        }    

        //####################################
        // SECTION 3c html Form
        //
        /* Display the HTML form. note that the action is to this same page. $phpSelf
          is defined in top.php
          NOTE the line:
         
          value="<?php print $email; ?>
          
          this makes the form sticky by displaying either the initial default value (line 35)
          or the value they typed in (line 84)
          
         NOTE this line:
         
          <?php if($emailERROR) print 'class="mistake"'; ?>
         
          this prints out a css class so that we can highlight the background etc. to
          make it stand out that a mistake happened here.
         
         */
        
        //Noah's New section-----------------------------------------------------
        $tabindex_counter = 1; //variable to increment tabindexes instead of manually typing them. IMPORTANT addition by Noah
        
        //Section to determine the correct autofocus to print (based on how many errors there are. I only print 1 autofocus per page and use a bunch of conditions to see how many errors there are and if they conflict, I give precedence to the 1st error and only print autofocus there
        //Each text field gets a $printAutoFocus variable (with the corresponding field name) & all but 1st name are initialized to false
        $printFirstNameAutoFocus = True;    //iniitialize to true it autofocuses on the first name the first itme the form is displayed
        if ($firstNameERROR) {      //if there's an error here, autofocus on this field
            $printFirstNameAutoFocus = True;
        }
//        elseif ($middleNameERROR or $lastNameERROR or $emailERROR) {
//            $printFirstNameAutoFocus = False;
//        }
        
        $printMiddleNameAutoFocus = False;  //initialize to false
        if ($middleNameERROR and !$firstNameERROR) {    //if there IS a middle name error, but NO first name error
            $printMiddleNameAutoFocus = True;   //change to true so autofocus WILL print for middle name
            $printFirstNameAutoFocus = False;   //change to fale so autofocus WON'T print for first name (avoiding multiple autofocuses on same page)
        }
//        elseif ($firstNameERROR or $lastNameERROR or $emailERROR){
//            $printMiddleNameAutoFocus = False;
//        }
        
        $printLastNameAutoFocus = False; //initialize to false
        if ($lastNameERROR and !$firstNameERROR and !$middleNameERROR ) { //if there IS a last name error, but NO first name error & NO middle name error
            $printLastNameAutoFocus = True;     //set autofocus on the last name field
            $printFirstNameAutoFocus = False;   //change the other 2 field to NOT display autofocus (avoiding multiple autofocuses)
            $printMiddleNameAutoFocus = False;
        }
//        elseif ($firstNameERROR or $middleNameERROR or $emailERROR) {
//            $printLastNameAutoFocus = False;
//        }

        $printEmailAutoFocus = False; //initialize to false
        if ($emailERROR and !$firstNameERROR and !$middleNameERROR and !$lastNameERROR) {   //if there is an email error, but no other errors
            $printEmailAutoFocus = True;        //set autofocus on the email field with the current error
            $printFirstNameAutoFocus = False;   //set all other fields to NOT display autofocus
            $printMiddleNameAutoFocus = False;
            $printLastNameAutoFocus = False;
        }

        
        ?>
                
            <form action="<?php print $phpSelf; ?>"  method="post" id="frmRegister">
            
            <fieldset class="wrapper">
                <legend>Sign Up Today</legend>
                <p>Sign up for our mailing list to stay informed about Sleek Panther Productions</p>

                <!--<fieldset class="wrapperTwo">
                    <legend>Please complete the following form</legend>-->

                    <fieldset class="contact">
                        <legend>Contact Info</legend>
                        <label for="txtFirstName" class="required">First Name           <!-- value=" php print $firstName; " prints out previously entered text so data is saved if an error occurs -->
                            <input type="text" id="txtFirstName" name="txtFirstName"
                                   value="<?php print $firstName; ?>"
                                   <?php print 'tabindex="'.$tabindex_counter++.'"' ;?> maxlength="45" placeholder="Enter your first name"
                                   <?php if ($firstNameERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()"
                                   <?php if ($printFirstNameAutoFocus) {print 'autofocus';} ?> > <!-- print autofocus based on php code above to see if it's the first field & no other errors exist -->
                        </label>
                        <label for="txtMiddleName">Middle Name (optional)
                            <input type="text" id="txtMiddleName" name="txtMiddleName"
                                   value="<?php print $middleName; ?>"
                                   <?php print 'tabindex="'.$tabindex_counter++.'"' ;?> maxlength="45" placeholder="Enter your middle name"
                                   <?php if ($middleNameERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()" 
                                   <?php if ($printMiddleNameAutoFocus) {print 'autofocus';} ?> >&nbsp;&nbsp;&nbsp;
                        </label>
                        <label for="txtLastName" class="required">Last Name
                            <input type="text" id="txtLastName" name="txtLastName"
                                   value="<?php print $lastName; ?>"
                                   <?php print 'tabindex="'.$tabindex_counter++.'"' ;?> maxlength="45" placeholder="Enter your last name"
                                   <?php if ($lastNameERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()"
                                   <?php if ($printLastNameAutoFocus) {print 'autofocus';} ?> > 
                        </label>
                        <label for="txtEmail" class="required">Email
                            <input type="text" id="txtEmail" name="txtEmail"
                                   value="<?php print $email; ?>"
                                   <?php print 'tabindex="'.$tabindex_counter++.'"' ;?> maxlength="45" placeholder="Enter a valid email"
                                   <?php if ($emailERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()"
                                   <?php if ($printEmailAutoFocus) {print 'autofocus';} ?> >
                        </label>
                    </fieldset> <!-- ends contact -->
                        <fieldset  class="listbox">
                            <label for="selFormDevice">How are you filling out this form?</label>   <!-- sel is for "select box" -->
                            <select id="selFormDevice" 
                                    name="selFormDevice" 
                                    <?php print 'tabindex="'.$tabindex_counter++.'"' ;?> >
                                <!-- php prints "selected" corresponding to a default value set when variable was initialized -->
                                <option <?php if($formDevice=="Computer") print " selected "; ?>
                                    value="Computer">Computer</option>
                                <option <?php if($formDevice=="Tablet") print " selected "; ?>
                                    value="Tablet" >Tablet</option>
                                <option <?php if($formDevice=="Mobile Phone") print " selected "; ?>
                                    value="Mobile Phone" >Mobile Phone</option>
                                <option <?php if($formDevice=="Other") print " selected "; ?>
                                    value="Other" >Other</option>
                            </select>
                        </fieldset>
                            
                            <fieldset class="checkbox">
                                <legend>Check the categories you wish to receive email about:</legend>
                                <!--the name & value are sent in the email,only value is stored in csv file-->
                                <label><input type="checkbox" 
                                              id="chkProductLaunches" 
                                              name="chkProductLaunches" 
                                              value="Yes Product Launches Emails"
                                              <?php if ($productLaunches) print ' checked '; // print it ONLY if it's true'?>
                                              <?php print 'tabindex="'.$tabindex_counter++.'"' ;?>> Major Product Launches</label>

                                <label><input type="checkbox" 
                                              id="chkPromotional" 
                                              name="chkPromotional" 
                                              value="Yes Promotional Events/Giveaways emails"
                                              <?php if ($promotional) print ' checked '; // print it ONLY if it's true'?>
                                              <?php print 'tabindex="'.$tabindex_counter++.'"' ;?>> Free Promotional Events/Giveaways emails</label>
                                
                                <label><input type="checkbox" 
                                              id="chkNewPositions" 
                                              name="chkNewPositions" 
                                              value="Yes Emails about New Positions"
                                              <?php if ($newPositions) print ' checked '; // print it ONLY if it's true'?>
                                              <?php print 'tabindex="'.$tabindex_counter++.'"' ;?>> New Positions (jobs)</label>
                            </fieldset>
                            
                            <fieldset class="radio">
                                <legend>How did you find out about us?</legend>
                                <label><input type="radio" 
                                              id="radHowDidYouHearAboutUsMouth" 
                                              name="radHowDidYouHearAboutUs" 
                                              value="Word of mouth"
                                              <?php print 'tabindex="'.$tabindex_counter++.'"' ; ?>
                                              <?php if($trafficSource=="Word of mouth") {print 'checked';} ?>
                                              >Word of mouth</label>
                                <label><input type="radio" 
                                              id="radHowDidYouHearAboutUsSearch" 
                                              name="radHowDidYouHearAboutUs" 
                                              value="Search Engine"
                                              <?php print 'tabindex="'.$tabindex_counter++.'"' ;?>
                                              <?php if($trafficSource=="Search Engine") print 'checked'?>
                                              >Search Engine</label>
                                <label><input type="radio" 
                                              id="radHowDidYouHearAboutUsSocial" 
                                              name="radHowDidYouHearAboutUs" 
                                              value="Social Media"
                                              <?php print 'tabindex="'.$tabindex_counter++.'"' ;?>
                                              <?php if($trafficSource=="Social Media") print 'checked'?>
                                              >Social Media</label>
                                <label><input type="radio" 
                                              id="radHowDidYouHearAboutUsInternet" 
                                              name="radHowDidYouHearAboutUs" 
                                              value="Internet Advertisement"
                                              <?php print 'tabindex="'.$tabindex_counter++.'"' ;?>
                                              <?php if($trafficSource=="Internet Advertisement") print 'checked'?>
                                              >Internet Advertisement</label>
                                <label><input type="radio" 
                                              id="radHowDidYouHearAboutUsOther" 
                                              name="radHowDidYouHearAboutUs" 
                                              value="Other"
                                              <?php print 'tabindex="'.$tabindex_counter++.'"' ;?>
                                              <?php if($trafficSource=="Other") print 'checked'?>
                                              >Other</label>
                            </fieldset>

                <!--</fieldset>  ends wrapper Two -->
                
                <!--<fieldset class="buttons">-->
                    <input type="submit" id="btnSubmit" name="btnSubmit" value="Register" <?php print 'tabindex="'.$tabindex_counter++.'"' ;?> >
                <!--</fieldset>--> <!-- ends buttons -->
            </fieldset> <!-- Ends Wrapper -->
        </form>
    
    <?php
    } // end body submit from line "print $message;" before section 3b
    ?>
            </article>
              </section>
        </section>
  
    <?php 
        if ($path_parts['dirname'] == "/cs008/assignment5.0") {
          include "non-pages/include/footer.php";
        }
        else {
          include "../non-pages/include/footer.php";
        }
    ?>
<!-- End Document –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>