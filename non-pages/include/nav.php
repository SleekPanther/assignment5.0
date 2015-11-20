<!--start nav.php-->
    <article class="container">
        <nav class="twelve columns centered"> <!-- centered is my class -->
            <ul>
                <?php
                //display the navigation links STARTING from the home page
                if ($path_parts['dirname'] == "/cs008/assignment5.0") {
                    print "<li><a class='button button-primary active'>Home</a>  </li> \n\t\t"; //active is my class, anchor tag with no link
                    print "<li><a class='button button-primary' href='services/'>Services</a></li> \n\t\t";
                    print "<li><a class='button button-primary' href='gallery/'>Gallery</a></li> \n\t\t";
                    print "<li><a class='button button-primary' href='positions/'>Positions</a></li> \n\t\t";
                    print "<li><a class='button button-primary' href='about/'>About</a></li> \n\t\t";
                    print "<li><a class='button button-primary' href='contact/'>Contact</a></li> \n";
                }
                else {          //if it's not the homepage, change the links to go up 1 directory before linking
                    print "<li><a class='button button-primary' href='../'>Home</a></li> \n\t\t"; //always print the home link
                    
                    if ($path_parts['dirname'] == "/cs008/assignment5.0/services") {
                        print "<li><a class='button button-primary active' >Services</a></li> \n\t\t";
                    }
                    else {
                        print "<li><a class='button button-primary' href='../services/'>Services</a></li> \n\t\t";
                    }
                    if ($path_parts['dirname'] == "/cs008/assignment5.0/gallery") {
                        print "<li><a class='button button-primary active' href='../gallery/'>Gallery</a>  </li> \n\t\t";
                    }
                    else {
                        print "<li><a class='button button-primary' href='../gallery/'>Gallery</a></li> \n\t\t";
                    }
                    if ($path_parts['dirname'] == "/cs008/assignment5.0/positions") {
                        print "<li><a class='button button-primary active' >Positions</a></li> \n\t\t";
                    }
                    else {
                        print "<li><a class='button button-primary' href='../positions/'>Positions</a></li> \n\t\t";
                    }
                    if ($path_parts['dirname'] == "/cs008/assignment5.0/about") {
                        print "<li><a class='button button-primary active' >About</a></li> \n\t\t";
                    }
                    else {
                        print "<li><a class='button button-primary' href='../about/'>About</a></li> \n\t\t";
                    }
                    if ($path_parts['dirname'] == "/cs008/assignment5.0/contact") {
                        print "<li><a class='button button-primary active' >Contact</a></li> \n";
                    }
                    else {
                        print "<li><a class='button button-primary' href='../contact/'>Contact</a></li> \n";
                    }
                }

                ?>
            </ul><!-- remove tabs from the last item in nav list to have this line up with ul from above -->
        </nav>
<!--end nav.php-->