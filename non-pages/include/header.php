<!--start header.php-->

            <?php
                //display unique page titles using $pathparts['basename'] to find the containing folder
                $page_heading="Sleek Panther Productions"; //initialize to a defualt value, so if I forget to include a page, it still gets heading text

                if ($containing_folder == "assignment5.0") {
                    $page_heading = "Home - Sleek Panther Productions"; //Set the value to be printed
                } elseif ($containing_folder == "services") {
                    $page_heading = "Services"; //Set the value to be printed
                } elseif ($containing_folder == "gallery") {
                    $page_heading = "Gallery"; //Set the value to be printed
                } elseif ($containing_folder == "positions") {
                    $page_heading = "Positions"; //Set the value to be printed
                } elseif ($containing_folder == "about") {
                    $page_heading = "About"; //Set the value to be printed
                } elseif ($containing_folder == "contact") {
                    $page_heading = "Contact"; //Set the value to be printed
                }
            ?>

        <section >
            <header>
                <section class="align-center" id="header">
                    <h1><?php print $page_heading ?></h1><!-- print page heading variable, set in the code above -->
                </section>
            </header>
        </section>

<!--end header.php-->