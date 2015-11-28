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
              <h4>Examples</h4>
              <p>Enjoy our slideshow of previous logos we've created for other clients. Your imagination is really the limit, so dream big. It's really up to you and what you think your business needs. We can always make suggestions but we've found that customers are more satisfied if it's their idea and we just are here to help them make it a reality.</p>
          </section>
          <section class="six columns box">
              <p>If you like something you see, check out more information of the services page or send us an email so we can get a better idea of how we can help you. Feel free to send examples of other business logos that you like. However, we can't promise to replicate it exactly because that's stealing. But it doesn't hurt to send it out way to give us somewhere to start.</p>
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