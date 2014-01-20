<footer class="content-info container" role="contentinfo">
    <div class="row">


        <div class="col-sm-6">

            <div class="archives">
                <h4>Archives</h4>
                <ul>
                    <?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12 ) ); ?>
                    <li><a href="">June 2015</a></li>
                    <li><a href="">June 2015</a></li>
                    <li><a href="">June 2015</a></li>
                    <li><a href="">June 2015</a></li>
                </ul>
            </div>

            <div class="social">
                <h4>Connect/Creep</h4>
                <a href="https://www.facebook.com/corrinetoracchio" class="icon icon-facebook" target="_blank"></a>
                <a href="http://instagram.com/cor_rines" class="icon icon-instagram" target="_blank"></a>
                <a href="https://twitter.com/cor_rine" class="icon icon-twitter" target="_blank"></a>
                <a href="http://www.linkedin.com/pub/corrine-toracchio/41/668/513" class="icon icon-linkedin" target="_blank"></a>
                
            </div>
            

        </div>

        <div class="col-sm-6">
            <?php get_search_form(); ?>
        </div>


        

    </div>

    <div class="row">
        <div class="col-lg-12">
            <p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
        </div>
    </div>

      <!-- <?php dynamic_sidebar('sidebar-footer'); ?> -->
</footer>

<?php wp_footer(); ?>