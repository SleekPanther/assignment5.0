        <?php
        include ("../non-pages/include/top.php");
        ?>
        
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

    
      <section class="row">
          <section class="twelve columns box">
              <section class="six columns float-right">

                <figure id="monitor-img" class="float-right">
                    <img src="../images/about/mirrored-monitors.jpg" alt="Mirroed Monitors">
                    <figcaption>Mirrored Monitor Illusion</figcaption>
                </figure>
              </section>
              <h2>How it all started</h2>
                <figure id="noah-img" class="float-right">
                      <img src="../images/about/noah-patullo.jpg" alt="Noah Patullo">
                      <figcaption>Noah Patullo</figcaption>
                </figure>
              <p>As a kid, Noah Patullo didn't really like drawing, but really found a passion for graphic design when he discovered <a href="https://www.gimp.org/" >GIMP</a>, a free image-editing program. He later branched out into <a href="https://inkscape.org/en/">InkScape</a> and from then on, he continued to teach himself how to use the software and take inspiration from everything.</p>
              <p>He started off by messing with photographs to create optical illusions. An early example can be seen on the right.</p>
              <p>He started Sleek Panther Productions in 2012 after realizing that he could turn his hobby into a business. It's still in the early days of existence, but Noah has accomplished on his own so far and is looking to grow the business. He has created logos for branding and T-shirt designs for various small businesses including <a href="http://www.abovenbeyondenergy.com/">Above-N-Beyond Energy</a> and <a href="http://burlingtontaiko.org/">Burlington Taiko</a></p>
              <p>Now that Sleek Panther Productions is getting rolling, Noah has expanded his horizons to include photography as well as graphic design.</p>
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