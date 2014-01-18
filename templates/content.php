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
