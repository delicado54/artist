</div>
        <div class="footer-container"><footer>
           
            <div class="container" id="footer-bottom">               
                <p>&copy; <?php bloginfo("title"); ?>, <?php echo date('Y'); ?>. All rights reserved</p>
<div class="row">
<div class="column">
<ul><li><a href="/work">Work</a>
<ul>
 <li><a href="/work/">All</a></li>
        <?php // pull out categories
        $cats = get_terms('work-type'); 
        //print_r($cats);
        foreach($cats as $cat):
            if($cat->slug=='current'):

                continue;
            endif;
        ?><li><a href="/work/?c=<?php echo $cat->name; ?>"><?php echo $cat->name; ?><?php //echo $cat->description; ?></a></li>
        <?php endforeach; ?>
</ul></li>
<li><a href="/about/">About</a>
<ul>
<?php $aboutpage = get_page_by_path('about'); wp_list_pages('title_li=0&child_of='.$aboutpage->ID); ?>
</ul>
</li></ul>
</div>

                    <div class="column">
                        <h4>Links</h4>
                        <ul>
                        <li><a href="http://fun.com" target="_blank">You could put some links here</a></li>

                        </ul>
                    </div>
    
                    <div  class="column">
                        <h4>Subjects</h4>
                        <div class="cat-list">
                         <ul>
                         <?php 
                         $args = array('orderby' => 'count', 'title_li' => '');
                         wp_list_categories( $args ); ?> 
                                     </ul>
                        </div>
                        <p class="more"><a href="http://www.joshuasofaer.com/categories">View all</a></p>
                    </div>

<br style="clear:both" />
</div>




            <div class="newsletter"><p>Subscribe to our quarterly newsletter </span><a href="http://eepurl.com/GLqBP" target="_blank">here</a></p></div>
        <div id="socialmedia">
          <a class="icon-twitter" href="https://twitter.com/frenchmotters">&nbsp;</a>
          <a class="icon-facebook" href="https://www.facebook.com/pages/French-Mottershead/435913769840584">&nbsp;</a>
          <a class="icon-linkedin" href="http://www.linkedin.com/pub/french-mottershead/a/36/b7a">&nbsp;</a>
          <a class="icon-youtube" href="http://www.youtube.com/user/frenchmottershead/videos">&nbsp;</a>
        </div>


            </div>
        </footer></div>

        </div><!-- #body-container -->

        <!-- Theme hook -->
        <?php wp_footer(); ?>
    <script src="<?php bloginfo('template_url'); ?>/js/libs/jquery.livesearch.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/libs/jquery.sticky.js"></script>
    <script>
    jQuery(window).load(function(){
      jQuery("header").sticky({ topSpacing: 0 });

    });
    </script>
       
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>

        <!--[if lt IE 7 ]>
        <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
        <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
        <![endif]-->

    </body>
</html>