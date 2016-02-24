<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

?><div class="blog-sidebar">
<?php
if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) || is_active_sidebar( 'sidebar-1' )  ) : ?>
	<div id="secondary" class="secondary">

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav-menu',
						'theme_location' => 'primary',
					) );
				?>
			</nav><!-- .main-navigation -->
		<?php endif; ?>

		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav id="social-navigation" class="social-navigation" role="navigation">
				<?php
					// Social links navigation menu.
					wp_nav_menu( array(
						'theme_location' => 'social',
						'depth'          => 1,
						'link_before'    => '<span class="screen-reader-text">',
						'link_after'     => '</span>',
					) );
				?>
			</nav><!-- .social-navigation -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div id="widget-area" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>

	</div><!-- .secondary -->

<?php endif; ?>
 <h4>Archives</h4>
   <ul>
   <?php //wp_get_archives(); ?>
   <?php
$year_prev = null;
$months = $wpdb->get_results(	"SELECT DISTINCT MONTH( post_date ) AS month ,
								YEAR( post_date ) AS year,
								COUNT( id ) as post_count FROM $wpdb->posts
								WHERE post_status = 'publish' and post_date <= now( )
								and post_type = 'post'
								GROUP BY month , year
								ORDER BY post_date DESC");
foreach($months as $month) :
	$year_current = $month->year;
	if ($year_current != $year_prev){
		if ($year_prev != null){?>
		</ul>
		<?php } ?>
	<h3><?php echo $month->year; ?></h3>
	<ul class="archive-list">
	<?php } ?>
	<li>
		<a href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>">
			<span class="archive-month"><?php echo date("F", mktime(0, 0, 0, $month->month, 1, $month->year)) ?></span>
			<span class="archive-count"><?php echo $month->post_count; ?></span>
		</a>
	</li>
<?php $year_prev = $year_current;
endforeach; ?>


   </ul>
                        <h4>Subjects</h4>
                        <div class="cat-list">
                         <ul>
                         <?php 
                         $args = array('orderby' => 'count', 'title_li' => '', 'number' =>15);
                         wp_list_categories( $args ); ?> 
                                     </ul>
                        </div>
                    </div>
</div>