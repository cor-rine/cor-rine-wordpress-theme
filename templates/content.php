<article <?php post_class(); ?>>
  <header>
    <div class="icon icon-<?php echo get_post_format(get_the_id()); ?>"></div>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
