        <?php
        include ("../non-pages/include/top.php");
        ?>
        
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
      <section class="row">
          <article class="twelve columns box" >
              <h2>Anything You Want (Within Reason)</h2>
              <p>We're here to serve your needs in any way we can (those needs related to Graphic Design of course). See below for our common services.</p>
          </article>
      </section>

      <section class="row box">
          <section class="two-thirds column">
              <article class="box">
                  <h3>Logo Design</h3>
                  <p>Got a business, event or idea that needs a quick logo? Well, we can help you out.</p>
                  <p>A logo is the identifying part of your brand/company and a you want a well-designed one that people remember. </p>
              </article>
              <section class="box">
                  <figure id="img-t-shirt" class="float-right">
                      <img src="../images/services/t-shirt.png" alt="T-Shirt">
                  </figure>
                  <article>
                    <h3>T-Shirt Designs</h3>
                    <p>Do you need to raise money or spread awareness of you cause or business?</p>
                    <p>T-Shirts are a great way to spread the word about whatever you're doing. But nobody likes to read a whole paragraph printed on your shirt, so that's where we come in. We'll turn your idea into a logo or phrase that you can put on a shirt. We can also connect you with companies to print your designs.</p>
                  </article>
              </section>
              <article class="box">
                  <h3>Website Graphics</h3>
                  <p>If you already have an logo and need those designs adapted for a website we can work with you to preserve your brand and choose the best images for each situation.</p>
              </article>
              <article class="box">
                  <h3>Photography <i class="fa fa-camera"></i></h3>
                  <p>We're in the early stages of expanding from graphic design to photography. </p>
              </article>
          </section>

          <section class="one-third column box" >
              <h3>Other Things</h3>
              <p>We haven't listed everything we can do because it's just impossible to pin everything down. These are some of the most popular services we provide, but if you need something that's not listed we can certainly work with you to fulfill your needs.</p>
              <p>Please feel free to suggest new services we could provide.</p>
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