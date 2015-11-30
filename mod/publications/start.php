<?php
/**
 * Elgg Pages
 *
 * @package ElggPages
 */

elgg_register_event_handler('init', 'system', 'publications_init');

/**
 * Initialize the pages plugin.
 *
 */
function publications_init() {

	// register a library of helper functions
	elgg_register_library('elgg:publications', elgg_get_plugins_path() . 'publications/lib/publications.php');

	$item = new ElggMenuItem('pages', elgg_echo('publications'), 'publications/all');
	elgg_register_menu_item('site', $item);

	// Register a page handler, so we can have nice URLs
	elgg_register_page_handler('publications', 'publications_page_handler');
	
	// Register an icon handler for blog
	elgg_register_page_handler("publicationsicon", "publications_icon_handler");

	// Register a url handler
	elgg_register_entity_url_handler('object', 'publication', 'publication_url_handler');

	// Register some actions
	$action_base = elgg_get_plugins_path() . 'publications/actions';
	elgg_register_action("publications/edit", "$action_base/publications/edit.php");
	elgg_register_action("publications/delete", "$action_base/publications/delete.php");

	// Register entity type for search
	elgg_register_entity_type('object', 'publication');
	
	//icon url overide
	elgg_register_plugin_hook_handler("entity:icon:url", "object", "publications_icon_hook");

	//add a widget
	elgg_register_widget_type('publications', elgg_echo('publications'), elgg_echo('publications:widget:description'), "index");

	// Language short codes must be of the form "pages:key"
	// where key is the array key below
	elgg_set_config('publications', array(
		'title' => 'text',
		'description' => 'longtext',
		'pubDate' => 'text',
		'tags' => 'tags',
		'access_id' => 'access',
	));
}

/**
 * Dispatcher for pages.
 * URLs take the form of
 *  All pages:        pages/all
 *  User's pages:     pages/owner/<username>
 *  Friends' pages:   pages/friends/<username>
 *  View page:        pages/view/<guid>/<title>
 *  New page:         pages/add/<guid> (container: user, group, parent)
 *  Edit page:        pages/edit/<guid>
 *  History of page:  pages/history/<guid>
 *  Revision of page: pages/revision/<id>
 *  Group pages:      pages/group/<guid>/all
 *
 * Title is ignored
 *
 * @param array $page
 * @return bool
 */
function publications_page_handler($page) {

	elgg_load_library('elgg:publications');
	
	if (!isset($page[0])) {
		$page[0] = 'all';
	}

	elgg_push_breadcrumb(elgg_echo('publications'), 'publications/all');

	$base_dir = elgg_get_plugins_path() . 'publications/pages/publications';

	$page_type = $page[0];
	switch ($page_type) {
		case 'owner':
			include "$base_dir/owner.php";
			break;
		case 'friends':
			include "$base_dir/friends.php";
			break;
		case 'view':
			set_input('guid', $page[1]);
			include "$base_dir/view.php";
			break;
		case 'add':
			set_input('guid', $page[1]);
			include "$base_dir/new.php";
			break;
		case 'edit':
			set_input('guid', $page[1]);
			include "$base_dir/edit.php";
			break;
		case 'group':
			include "$base_dir/owner.php";
			break;
		case 'history':
			set_input('guid', $page[1]);
			include "$base_dir/history.php";
			break;
		case 'revision':
			set_input('id', $page[1]);
			include "$base_dir/revision.php";
			break;
		case 'all':
			include "$base_dir/world.php";
			break;
		default:
			return false;
	}
	return true;
}

//icon url handler
function publications_icon_handler($page) {
	// The username should be the file we"re getting
	if (isset($page[0])) {
		set_input("guid",$page[0]);
	}
	if (isset($page[1])) {
		set_input("size",$page[1]);
	}

	// Include the standard profile index
	include(dirname(__FILE__) . "/pages/icon.php");
	return true;
}

//icon url overide hook
function publications_icon_hook($hook, $entity_type, $returnvalue, $params) {
	if (!empty($params) && is_array($params)) {
		$entity = $params["entity"];

		if(elgg_instanceof($entity, "object", "publication")){
			$size = $params["size"];

			if ($icontime = $entity->icontime) {
				$icontime = "{$icontime}";

				$filehandler = new ElggFile();
				$filehandler->owner_guid = $entity->getOwnerGUID();
				$filehandler->setFilename("publications/" . $entity->getGUID() . $size . ".jpg");

				if ($filehandler->exists()) {
					$url = elgg_get_site_url() . "publicationsicon/{$entity->getGUID()}/$size/$icontime.jpg";

					return $url;
				}
			}
		}
	}
}

function publication_url_handler($entity) {
	if (!$entity->getOwnerEntity()) {
		// default to a standard view if no owner.
		return FALSE;
	}

	$friendly_title = elgg_get_friendly_title($entity->title);

	return "publications/view/{$entity->guid}/$friendly_title";
}