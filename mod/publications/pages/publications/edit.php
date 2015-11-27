<?php
/**
 * Edit a page
 *
 * @package ElggPages
 */

gatekeeper();

$guid = (int)get_input('guid');
$publication = get_entity($guid);
if (!$publication) {
	register_error(elgg_echo('noaccess'));
	forward('');
}

elgg_push_breadcrumb($publication->title, $publication->getURL());
elgg_push_breadcrumb(elgg_echo('edit'));

$title = elgg_echo("publications:edit");

if ($publication->canEdit()) {
	$vars = publications_prepare_form_vars($publication);

	$content = elgg_view_form('publications/edit', $vars);
} else {
	$content = elgg_echo("publications:noaccess");
}

$body = elgg_view_layout('content', array(
	'filter' => '',
	'content' => $content,
	'title' => $title,
));

echo elgg_view_page($title, $body);
