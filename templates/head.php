<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='http://fonts.googleapis.com/css?family=Bree+Serif|Crimson+Text|Carrois+Gothic+SC' rel='stylesheet' type='text/css'>
  
    <meta property="og:title" content="cortravels | <?php echo the_title(); ?>"/>
    <meta property="og:image" content="http://cor-rine.com/blog/wp-content/themes/cor-rine-wordpress-theme/assets/img/cor-travel.jpg"/>
    <meta property="og:url" content="<?php echo get_permalink( $post->ID ); ?>"/>
    <meta property="og:site_name" content="cortravels"/>
    <meta property="og:type" content="blog"/>
    <meta property="og:description" content="The travel blog of Corrine Toracchio."/>

  <?php wp_head(); ?>

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
  
</head>