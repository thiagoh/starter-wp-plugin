<?php

function my_first_plugin_filter_title($title) {
	return 'The ' . $title . ' was filtered';
}

add_filter('the_title', ('my_first_plugin_filter_title'));

?>