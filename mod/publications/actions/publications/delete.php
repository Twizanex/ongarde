<?php
/**
 * Remove a page
 *
 * Subpages are not deleted but are moved up a level in the tree
 *
 * @package ElggPages
 */

$guid = get_input('guid');
$publication = get_entity($guid);
if (elgg_instanceof($publication, 'object', 'publication')) {
	// only allow owners and admin to delete
	if (elgg_is_admin_logged_in() || elgg_get_logged_in_user_guid() == $publication->getOwnerGuid()) {
		
		if ($publication->delete()) {
			system_message(elgg_echo('publications:delete:success'));
				forward("publications/all");
		}
	}
}

register_error(elgg_echo('pages:delete:failure'));
forward(REFERER);
