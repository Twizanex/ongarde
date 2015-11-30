<?php
/**
 * View a single publication
 *
 * @package ElggPages
 */
$guid = get_input('guid');
$publication = get_entity($guid);
if (!$publication) {
	register_error(elgg_echo('noaccess'));
	$_SESSION['last_forward_from'] = current_page_url();
	forward('');
}

elgg_set_page_owner_guid($publication->getContainerGUID());

group_gatekeeper();

$container = elgg_get_page_owner_entity();
if (!$container) {
}

$title = $publication->title;

$content .= elgg_view_entity($publication, array('full_view' => true));

$body = elgg_view_layout('content', array(
	'filter' => '',
	'content' => $content,
	'title' => $title,
));

echo elgg_view_page($title, $body);
