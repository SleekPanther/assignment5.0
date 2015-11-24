        <?php
        include ("../non-pages/include/top.php");
        ?>
        
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

    
      <section class="row">
          <section class="twelve columns box">
            <section class="six columns box" >
                <h2>How to Reach Us</h2>
                <p>You can send us mail, thou who really does that anymore it's all digital nowadays.</p>
                <p>So why not send us an email: <a href='mailto:noah.patullo@uvm.edu' class='italic'>Noah.Patullo@uvm.edu</a></p>
                <p>Or you can fill out the form below to be added to our mailing lists and stay in the loop</p>
            </section>
            <section class="six columns box">
                <h3>Directions</h3>
                <p>1600 Pennsylvania Ave NW<br>Washington, DC<br>20500</p>
                <iframe id='contact-map' src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d3105.1533072139914!2d-77.03892363397257!3d38.89760937957068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x89b7b7bce1485b19%3A0x9fc7bf09fd5d9daf!2sThe+White+House%2C+1600+Pennsylvania+Ave+NW%2C+Washington%2C+DC+20500!3m2!1d38.8976633!2d-77.0365739!5e0!3m2!1sen!2sus!4v1448379719537" allowfullscreen></iframe>
            </section>
          </section>
      </section>

      <section class="row">
          <section class="twelve column box" >
              <form>
                  form
              </form>
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