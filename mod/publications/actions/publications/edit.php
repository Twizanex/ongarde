<?php
/**
 * Create or edit a page
 *
 * @package ElggPages
 */

$variables = elgg_get_config('publications');
$input = array();
foreach ($variables as $name => $type) {
	if ($name == 'title') {
		$input[$name] = htmlspecialchars(get_input($name, '', false), ENT_QUOTES, 'UTF-8');
	} else {
		$input[$name] = get_input($name);
	}
	if ($type == 'tags') {
		$input[$name] = string_to_tag_array($input[$name]);
	}
}

// Get guids
$guid = (int)get_input('publication_guid');
$container_guid = (int)get_input('container_guid');
$parent_guid = (int)get_input('parent_guid');

elgg_make_sticky_form('page');

if (!$input['title']) {
	register_error(elgg_echo('pages:error:no_title'));
	forward(REFERER);
}

if ($guid) {
	$publication = get_entity($page_guid);
	if (!$publication || !$publication->canEdit()) {
		register_error(elgg_echo('publications:error:no_save'));
		forward(REFERER);
	}
	$new_page = false;
} else {
	$publication = new ElggObject();
	$publication->subtype = 'publication';
}

if (sizeof($input) > 0) {
	// don't change access if not an owner/admin
	$user = elgg_get_logged_in_user_entity();
	
	foreach ($input as $name => $value) {
		$publication->$name = $value;
	}
}

// need to add check to make sure user can write to container
$publication->container_guid = $container_guid;


if ($publication->save()) {
	
	if(($icon_file = get_resized_image_from_uploaded_file("image", 100, 100)) && ($icon_sizes = elgg_get_config("icon_sizes"))){
		// create icon
		$prefix = "publications/" . $publication->getGUID();

		$fh = new ElggFile();
		$fh->owner_guid = $publication->getOwnerGUID();

		foreach($icon_sizes as $icon_name => $icon_info){
			if($icon_file = get_resized_image_from_uploaded_file("image", $icon_info["w"], $icon_info["h"], $icon_info["square"], $icon_info["upscale"])){
				$fh->setFilename($prefix . $icon_name . ".jpg");

				if($fh->open("write")){
					$fh->write($icon_file);
					$fh->close();
				}
			}
		}

		$publication->icontime = time();
	}
	system_message(elgg_echo('publications:saved'));

	forward($publication->getURL());
} else {
	register_error(elgg_echo('publications:error:notsaved'));
	forward(REFERER);
}
