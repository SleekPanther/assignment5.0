        <?php
        include ("../non-pages/include/top.php");
        ?>
        
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

    
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