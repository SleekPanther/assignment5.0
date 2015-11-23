        <?php
        include ("../non-pages/include/top.php");
        ?>
        
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

        <section class="row">
            <section class="twelve columns box">
                <section>
                    
                </section>
                <section class="galleria margin-auto">
                    <?php   //in this section I use php to print the images required for the slideshow. The fileanames are all stored in a csv file
                        $debug = false;

                    if (isset($_GET["debug"])) {
                        $debug = true;
                    }

                    $myFileName = "non-pages/images-list";
                    $fileExt = ".csv";
                    $filename = $myFileName . $fileExt;

                    if ($debug)
                        print "\n\n<p>filename is " . $filename;

                    $file = fopen($filename, "r");
                    if ($file) {
                        if ($debug)
                            print "<p>Begin reading data into an array.</p>\n";

                        /* This reads the first row, which in our case is the column headers */
                        //$headers = fgetcsv($file);

                        if ($debug) {
                            print "<p>Finished reading headers.</p>\n";
                            print "<p>My header array<p><pre> ";
                            print_r($headers);
                            print "</pre></p>";
                        }
                        /* the while (similar to a for loop) loop keeps executing until we reach 
                         * the end of the file at which point it stops. the resulting variable 
                         * $records is an array with all our data.
                         */
                        while (!feof($file)) {
                            $records[] = fgetcsv($file);
                        }

                        fclose($file);  //closes the file

                        if ($debug) {
                            print "<p>Finished reading data. File closed.</p>\n";
                            print "<p>My data array<p><pre> ";
                            print_r($records);
                            print "</pre></p>";
                        }
                    }
                    
                    foreach ($records as $oneRecord) {  //print out information from the csv file. column 1 is the filename & column 2 is the alt text
                        print '<img  src="../images/gallery/gallery1/' . $oneRecord[1] . '" alt="' . $oneRecord[2] . '">' . "\n\t\t\t";
                    }
                ?>
                    <!-- manual code
                    <img src="../images/gallery/gallery1/image001.jpg" alt="image 1">
                    <img src="../images/gallery/gallery1/image002.jpg">
                    <img src="../images/gallery/gallery1/image003.jpg">
                    <img src="../images/gallery/gallery1/image004.jpg">
                    <img src="../images/gallery/gallery1/image005.jpg">-->
                </section>
            </section>
        </section>
      <section class="row">
          <section class="six columns box" >
              <h4>Example Business</h4>
              <h1><?php print $path_parts['dirname'] ?></h1>
              <p>This index.html page is a placeholder with the CSS, font and favicon. It's just waiting for you to add some content! If you need some help hit up the <a href="http://www.getskeleton.com">Skeleton documentation</a>.</p>
          </section>
          <section class="six columns box">
              <h4>Example Business2</h4>
              <p>asdf This index.html page is a placeholder with the CSS, font and favicon. It's just waiting for you to add some content! If you need some help hit up the <a href="http://www.getskeleton.com">Skeleton documentation</a>.</p>
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