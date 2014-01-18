<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>

    <?php if ( has_post_thumbnail() ): ?>

        <div class="hero">
            <?php the_post_thumbnail(); ?>
        </div>
      
    <?php endif; ?>

    <div class="icon icon-<?php echo get_post_format(get_the_id()); ?>"></div>
    <header>
      <?php if (get_post_format(get_the_id()) != "quote"): ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php endif; ?>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>

      <div class="entry-meta tags">
        <?php
          $posttags = get_the_tags();
          if ($posttags) {
            foreach($posttags as $tag) {
              echo '<a class="tag-link" href="'. get_tag_link($tag->id) .'">' . $tag->name . '</a>';
            }
          }
          else {
            echo '<p class="tag-link">No Tags</p>';
          }
          ?>
      </div>

    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
