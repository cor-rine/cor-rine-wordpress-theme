<?php

$args = array(
	'numberposts' => -1,
	'posts_per_page' => -1,
	'meta_key' => 'show_on_map',
	'meta_value' => true,
	'order' => "ASC"
);

$the_query = new WP_Query( $args );

$myposts = get_posts('');

$postData = [];



if ($the_query->have_posts()) {

		while ($the_query->have_posts()) {
			
			$the_query->the_post();

			$flightPath = [];			

			if (get_field("latitude2") != null && get_field("longitude2") != null) {
				array_push($flightPath, get_field("latitude"));
				array_push($flightPath, get_field("longitude"));
				array_push($flightPath, get_field("latitude2"));
				array_push($flightPath, get_field("longitude2"));
			}
			if (get_field("latitude3") != null && get_field("longitude3") != null) {
				array_push($flightPath, get_field("latitude3"));
				array_push($flightPath, get_field("longitude3"));
			}
			if (get_field("latitude4") != null && get_field("longitude4") != null) {
				array_push($flightPath, get_field("latitude4"));
				array_push($flightPath, get_field("longitude4"));
			}

			if (sizeof($flightPath) > 0) {
				array_push($postData, array(
						"flightpath" => $flightPath,
						"id" => get_the_ID(),
			    	"title" => get_the_title(),
			    	"content" => apply_filters('the_excerpt', get_the_excerpt()),
			    	"lat" => get_field('latitude'),
			    	"lng" => get_field("longitude"),
			    	"map_icon" => get_field("map_icon")
					));
			} else {
				array_push($postData, array(
					"id" => get_the_ID(),
		    	"title" => get_the_title(),
		    	"content" => apply_filters('the_excerpt', get_the_excerpt()),
		    	"lat" => get_field('latitude'),
		    	"lng" => get_field("longitude"),
		    	"map_icon" => get_field("map_icon")
				));
			}

			
		} // end while
	} // end if


// foreach($myposts as $post) :
// 	setup_postdata($post);

// 	// echo apply_filters( 'the_content', $post->ID );

// endforeach;


echo ("<script type=\"text/javascript\"> var mapContent = [".json_encode($postData))."];

var templateUrl = '".get_bloginfo("template_url")."';
</script>";

// echo (json_encode($postData));

wp_reset_postdata();
wp_reset_query();

?>