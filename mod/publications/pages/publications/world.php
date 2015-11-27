<?php
/**
 * List all pages
 *
 * @package ElggPages
 */

$title = elgg_echo('publications:all');

elgg_pop_breadcrumb();
elgg_push_breadcrumb(elgg_echo('publications'));

elgg_register_title_button();

$content = elgg_list_entities(array(
	'types' => 'object',
	'subtypes' => 'publication',
	'full_view' => false,
));
if (!$content) {
	$content = '<p>' . elgg_echo('publications:none') . '</p>';
}

$body = elgg_view_layout('content', array(
	'filter_context' => 'all',
	'content' => $content,
	'title' => $title,
	'sidebar' => elgg_view('publications/sidebar'),
));
error_log(print_r($content, true));
echo elgg_view_page($title, $body);
