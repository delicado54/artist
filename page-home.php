<?php 
get_header();
if ( have_posts() ) : the_post(); 
?>
<div class="container clearfix">
 
    <div class="wrapper clearfix">
    
      <?php the_content(); ?>
 <ul class="bxslider">
<li><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/01_neighbours-1.jpg" title="01_neighbours" /><p class="image-caption">When needed, we look out for each other</p></li>
<li><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/02_lifelong.jpg" title="02_lifelong" /><p class="image-caption">We’ve lived here our whole lives</p></li>
<li><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/03_workers.jpg" title="03_workers" /><p class="image-caption">We work from home</p></li>
<li><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/04_parents.jpg" title="04_parents" /><p class="image-caption">We put them to bed every night</p></li>
<li><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/05_smallspace.jpg" title="05_smallspace" /><p class="image-caption">We cope with the pressures of living in a small space</p></li>
<li><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/06_gardeners.jpg" title="06_gardeners" /><p class="image-caption">Our challenge is to keep things growing</p></li>
<li><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/07_streetlife.jpg" title="07_streetlife" /><p class="image-caption">The street life does more than keep us up</p></li>
<li><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/08_bataneyelid.jpg" title="08_bataneyelid" /><p class="image-caption">We like that no-one bats an eyelid here</p></li>
<li><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/09_activists.jpg" title="09_activists" /><p class="image-caption">We never take no for an answer; we fight our own corner</p></li>
<li><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/10_cavalry.jpg" title="10_cavalry" /><p class="image-caption">We hear the clatter of hooves as the Cavalry passes by</p></li>
<li><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/11_walkers.jpg" title="11_walkers" /><p class="image-caption">From here we can walk everywhere</p></li></ul>

    news items (latest 3)
  </div>
  
</div>
<?php
endif;
get_footer();
?>