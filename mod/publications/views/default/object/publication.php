<?php
/**
 * View for page object
 *
 * @package ElggPages
 *
 * @uses $vars['entity']    The page object
 * @uses $vars['full_view'] Whether to display the full view
 * @uses $vars['revision']  This parameter not supported by elgg_view_entity()
 */


$full = elgg_extract('full_view', $vars, FALSE);
$publication = elgg_extract('entity', $vars, FALSE);
$revision = elgg_extract('revision', $vars, FALSE);

if (!$publication) {
	return TRUE;
}

$publication_icon = elgg_view("output/img", array("src" => $publication->getIconURL('medium'), "alt" => $publication->title));

$metadata = elgg_view_menu('entity', array(
	'entity' => $vars['entity'],
	'handler' => 'publications',
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));


// do not show the metadata and controls in widget view
if (elgg_in_context('widgets') || $revision) {
	$metadata = '';
}

if ($full) {
	$body = elgg_view('output/longtext', array('value' => $publication->description));

	$params = array(
		'entity' => $publication,
		'metadata' => $metadata,
		'subtitle' => $subtitle,
	);
	$params = $params + $vars;
	$summary = elgg_view('object/elements/summary', $params);

	echo elgg_view('object/elements/full', array(
		'entity' => $publication,
		'title' => false,
		'icon' => $publication_icon,
		'summary' => $summary,
		'body' => $body,
	));

} else {
	// brief view

	$excerpt = elgg_get_excerpt($publication->description);

	$params = array(
		'entity' => $publication,
		'icon' => $publication_icon,
		'metadata' => $metadata,
		'subtitle' => $subtitle,
		'content' => $excerpt,
	);
	$params = $params + $vars;
	$list_body = elgg_view('object/elements/summary', $params);

	echo elgg_view_image_block($publication_icon, $list_body);
}
