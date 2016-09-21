<?php

function my_first_plugin_filter_title($title) {
	return 'The ' . $title . ' was filtered';
}

function my_first_plugin_filter_content($content) {

	$filteredContent = '';
	$lines = preg_split("(\n|<[bB][rR]>)", $content);

	for ($i = 0; $i < count($lines); $i++) {
		$filteredContent .= $lines[$i] . "[end of line]<BR />\n";
	}

	return $filteredContent;
}

add_filter('the_title', 'my_first_plugin_filter_title');
add_filter('the_content', 'my_first_plugin_filter_content');

?>