<?php if (!have_posts()) : ?>

  <section class="no-results">
    <div class="icon icon-star spin"></div>
    <header>
        <caption>You've searched for something that can't be found.<br/>Here's a star instead.</caption>
    </header>
  </section>

<?php else:?>
  <?php get_template_part('templates/page', 'header'); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('Older', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>
