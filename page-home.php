<?php 
get_header();
if ( have_posts() ) : the_post(); 
?>
<div class="container clearfix">
 
    <div class="wrapper clearfix">
    
      <?php the_content(); ?>
      
 <ul class="bxslider">
<li><a href="#"><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/05_smallspace.jpg" title="05_smallspace" /></a><p class="image-caption">Over The Threshold, 2011. Soho, London. Photo: French&Mottershead/Adrian Wood</p></li>
<li><a href="#"><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/laura.jpg"  /></a><p class="image-caption">The Shops Project: Laura (Fashion Boutique), 2009. Ljubljana, Slovenia. Photo: French&Mottershead/Urska Boljkovac</p></li>
<li><a href="#"><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/tuulastus.jpg" /></a><p class="image-caption">Understory 9: Tuulastas (night fishing), 2012. Kuopio, Finland. Photo: Pekka Makinen</p></li>
<li><a href="#"><img src="http://fm.zarmi.com/wp-content/uploads/2015/12/psecho1.jpg"  /></a><p class="image-caption">The Echo Newspapers, 2007 &amp; 2010.</p></li>
</ul>
<h3>Latest Updates</h3>
<ul class="news">
      <li>Did you get to listen to our radio program? If not and you want to a 'refreshing perspective on the five stages of human decomposition' (thanks Stephen Hodge) here's a permalink: <a href="#">https://www.mixcloud.com/Resonance/clear-spot-18th-december-2015-french-mottershead/</a></li>
      <li>Glad to hear news of 'The Perth &amp; Sydney Echo' now part of a national collection. http://cs.nga.gov.au/Detail.cfm?IRN=270480</li>
      <li>In three days time we join the company of others in Turku, then next week the work goes (without us) to Helsinki! <a href="">http://newperformance.fi/?lang=en</a></li>
      </ul>
  </div>
  
</div>
<?php
endif;
get_footer();
?>