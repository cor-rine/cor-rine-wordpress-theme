<?php
/*
Template Name: Map Template
*/

// $myposts = get_posts('');

?>

<article class="worldmap">

	<header>
		<div class="icon icon-earth"></div>
		<h2 class="entry-title">Map</h2>
	</header>

	<div id="map-canvas">
		<!-- MAP CONTENT WILL FIT HERE -->
	</div>

</article>

<?php

get_template_part('templates/map-content');

//wp_reset_postdata();
?>