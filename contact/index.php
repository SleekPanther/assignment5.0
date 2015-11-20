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
          <section class="two-thirds column box">
              <section class="box">2/3 Aenean aliquam ipsum et magna ullamcorper, ut ornare lectus pretium. Nullam hendrerit, mauris at scelerisque semper, turpis turpis molestie erat, a imperdiet sapien sapien eget diam. Donec eget aliquet tellus. Sed porta orci in purus hendrerit, vitae luctus mauris lobortis. Nullam suscipit pharetra libero id tincidunt. Morbi eu elit ac nisi elementum suscipit. Praesent at libero augue. Vestibulum varius max
              </section>
              <section class="box">2/3 Aenean aliquam ipsum et magna ullamcorper, ut ornare lectus pretium. Nullam hendrerit, mauris at scelerisque semper, turpis turpis molestie erat, a imperdiet sapien sapien eget diam. Donec eget aliquet tellus. Sed porta orci in purus hendrerit, vitae luctus mauris lobortis. Nullam suscipit pharetra libero id tincidunt. Morbi eu elit ac nisi elementum suscipit. Praesent at libero augue. Vestibulum varius max
              </section>
          </section>

          <section class="one-third column box" >
              elit id tempor. Nullam lacinia dui nulla, sit amet dapibus odio ultricies eget. Pellentesque accumsan tincidunt tempus. Donec mi lorem, semper at metus eu, scelerisque tincidunt quam. Nunc id erat vel lectus suscipit consequat dapibus at tellus. Cras id tristique velit. Etiam dignissim, turpis sit amet sodales auctor, diam arcu ultrices sem, nec congue nisi sem quis justo.
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