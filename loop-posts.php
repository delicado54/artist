<?php while ( have_posts() ): the_post(); ?>
<article class="post" id="post-<?php the_id(); ?>">

    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>


    <?php the_excerpt(); ?>

</article>
<?php endwhile; ?>