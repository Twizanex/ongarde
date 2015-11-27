<?php
/**
 * Pages function library
 */

/**
 * Prepare the add/edit form variables
 *
 * @param ElggObject $page
 * @return array
 */
function publications_prepare_form_vars($publication = null) {

	// input names => defaults
	$values = array(
		'title' => '',
		'description' => '',
		'pubDate' => '',
		'access_id' => ACCESS_DEFAULT,
		'tags' => '',
		'container_guid' => elgg_get_page_owner_guid(),
		'guid' => null,
		'entity' => $publication
	);

	if ($publication) {
		foreach (array_keys($values) as $field) {
			if (isset($publication->$field)) {
				$values[$field] = $publication->$field;
			}
		}
	}

	if (elgg_is_sticky_form('publication')) {
		$sticky_values = elgg_get_sticky_values('publication');
		foreach ($sticky_values as $key => $value) {
			$values[$key] = $value;
		}
	}

	elgg_clear_sticky_form('publication');

	return $values;
}