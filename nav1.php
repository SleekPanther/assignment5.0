<!-- copied from assignment 3.1 -->

       <nav class="centered">
            <ul>
                <?php
                // This sets the current page to not be a link. Repeat this if block for each menu item 
                if ($path_parts['filename'] == "index") {
                    print "<li><a class='active'>Home</a>  </li> \n\t\t";
                } else {
                    print "<li><a href='index.php'>Home</a>  </li> \n\t\t";
                }
                
                if ($path_parts['filename'] == "form") {
                    print "<li><a class='active'>Join</a> </li> \n\t\t";
                } else {
                    print "<li><a href='form.php'>Join</a> </li> \n\t\t";
                }
                
                ?>
            </ul>
        </nav>