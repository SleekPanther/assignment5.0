<!--start header.php-->

            <?php
                //display unique page titles
                $page_heading="Sleek Panther Productions"; //initialize to a defualt value, so if I forget to include a page, it still gets heading text

                if ($path_parts['dirname'] == "/cs008/assignment5.0") {
                    $page_heading = "Home - Sleek Panther Productions"; //Set the value to be printed
                } elseif ($path_parts['dirname'] == "/cs008/assignment5.0/services") {
                    $page_heading = "Services"; //Set the value to be printed
                } elseif ($path_parts['dirname'] == "/cs008/assignment5.0/gallery") {
                    $page_heading = "Gallery"; //Set the value to be printed
                } elseif ($path_parts['dirname'] == "/cs008/assignment5.0/positions") {
                    $page_heading = "Positions"; //Set the value to be printed
                } elseif ($path_parts['dirname'] == "/cs008/assignment5.0/about") {
                    $page_heading = "About"; //Set the value to be printed
                } elseif ($path_parts['dirname'] == "/cs008/assignment5.0/contact") {
                    $page_heading = "Contact"; //Set the value to be printed
                }
            ?>

        <section >
            <header>
                <section class="margin-auto align-center" id="header">
                    <h1><?php print $page_heading ?></h1><!-- print page heading variable, set in the code above -->
                </section>
            </header>
        </section>

<!--end header.php-->