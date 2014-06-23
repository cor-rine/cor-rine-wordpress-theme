<article <?php post_class(); ?>>

    <?php if ( has_post_thumbnail() ): ?>

        <div class="hero">
            <?php the_post_thumbnail(); ?>
        </div>
      
    <?php endif; ?>


  <header>

    <div class="icon icon-<?php echo get_post_format(get_the_id()); ?>"></div>

    <?php if (get_post_format(get_the_id()) == "quote"): ?>
        <?php get_template_part('templates/entry-meta'); ?>

    <?php else: ?>

        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php get_template_part('templates/entry-meta'); ?>
        <?php
          $content = get_post_field( 'post_content', $post->ID );
          $word_count = str_word_count( strip_tags( $content ) );

          $read_time = ceil($word_count/300);
          $read_class = 'short';
          if ($read_time < 3) {
            $read_class = 'short-length';
          }
          elseif ($read_time < 10 && $read_time >= 3) {
            $read_class = 'medium-length';   
          }
          else {
            $read_class = 'long-length';
          }
          echo ('<p class="read-time '.$read_class.'">'.$read_time.' minute read</p>');
        ?>

    <?php endif; ?>

    
  </header>
  <div class="entry-summary clearfix">

    <?php if (get_post_format(get_the_id()) == "quote" ||
              get_post_format(get_the_id()) == "image"): ?>
        <a href="<?php the_permalink(); ?>">
            <?php the_content(); ?>
        </a>
    
    <?php else: ?>
        <?php the_excerpt(); ?>
        
    <?php endif; ?>
    
    
  </div>
</article>
