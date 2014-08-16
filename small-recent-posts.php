<?php
/* Plugin Name: Small Recent Posts
 * Plugin URI: https://github.com/ryuslash/small-recent-posts
 * Description: Replace [recent] with a short latest posts list
 * Version: 0.1.0
 * Author: Tom Willemse
 * Author URI: https://ryuslash.org
 */

function oni_srp_recent_posts()
{
    $out = '<ul>';
    $recentPosts = new WP_Query();
    $recentPosts->query( 'posts_per_page=5' );

    while ( $recentPosts->have_posts() ) {
        $recentPosts->the_post();

        $out .= '<li><a href="' . get_permalink() . '">'
            . get_the_title() . '</a>'
            . ' <span class="timestamp">' . get_the_date() . '</span>'
            .'</li>';
    }

    $out .= '</ul>';

    return $out;
}

add_shortcode('recent', 'oni_srp_recent_posts');
?>