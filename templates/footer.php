<footer class="content-info container" role="contentinfo">
    <div class="row">


        <div class="col-md-4">

            <div class="box recent-posts">
                <h4>Recent Posts</h4>
                <ul>
                    <?php
                        $args = array( 'numberposts' => '10' );
                        $recent_posts = wp_get_recent_posts( $args );
                        foreach( $recent_posts as $recent ){
                            echo '<li><a href="' . get_permalink($recent["ID"]) . '"><span class="icon icon-'.get_post_format($recent["ID"]).'"></span>' .   $recent["post_title"].'</a> </li> ';
                        }
                    ?>
                </ul>
            </div>

        </div>


        <div class="col-md-4">
            <div class="box archives">
                <h4>Archives</h4>
                <ul>
                    <?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12 ) ); ?>
                </ul>
            </div>

            <div class="box categories">
                <h4>Categories</h4>
                <ul>
                    <?php
                        $args = array(
                          'orderby' => 'name',
                          'parent' => 0
                          );
                        $categories = get_categories( $args );
                        foreach ( $categories as $category ) {
                            echo '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>


        <div class="col-md-4">
            <div class="box searchbar">
                <?php get_search_form(); ?>
            </div>

            <div class="box social">
                <h4>Connect/Creep</h4>
                <a href="https://www.facebook.com/corrinetoracchio" class="icon icon-facebook" target="_blank"></a>
                <a href="http://instagram.com/cor_rines" class="icon icon-instagram" target="_blank"></a>
                <a href="https://twitter.com/cor_rine" class="icon icon-twitter" target="_blank"></a>
                <a href="http://www.linkedin.com/pub/corrine-toracchio/41/668/513" class="icon icon-linkedin" target="_blank"></a>
            </div>
            
        </div>
        

    </div>

    <div class="row copyright">
        <div class="col-lg-12">
            <p class="copyright">&copy; <?php echo date('Y'); ?> Corrine Toracchio</p>
        </div>
    </div>

      <!-- <?php dynamic_sidebar('sidebar-footer'); ?> -->
</footer>

<?php wp_footer(); ?>