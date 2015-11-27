<?php
/**
 * Page edit form body
 *
 * @package ElggPages
 */

$variables = elgg_get_config('publications');
$user = elgg_get_logged_in_user_entity();
$entity = elgg_extract('entity', $vars);
$can_change_access = true;

$container_guid = get_input('guid');
$container_entity = get_entity($container_guid);

if(elgg_instanceof($container_entity, "group")){
	if($access_id = -1){
		$vars['access_id'] = $container_entity->group_acl;
	}
}

if ($user && $entity) {
	$can_change_access = ($user->isAdmin() || $user->getGUID() == $entity->owner_guid);
}

echo "<label>" . elgg_echo('publications:photo') . "</label>";
echo elgg_view("input/file", array(
	"name" => "image",
	"id" => "image",
));

foreach ($variables as $name => $type) {

?>
<div>
	<label><?php echo elgg_echo("publications:$name") ?></label>
	<?php
		if ($type != 'longtext') {
			echo '<br />';
		}

		echo elgg_view('input/'.$type, array(
			'name' => $name,
			'value' => $vars[$name],
			'entity' => ($name == 'parent_guid') ? $vars['entity'] : null,
		));
	?>
</div>
<?php
}
echo '<div class="elgg-foot">';
if ($vars['guid']) {
	echo elgg_view('input/hidden', array(
		'name' => 'publication_guid',
		'value' => $vars['guid'],
	));
}
echo elgg_view('input/hidden', array(
	'name' => 'container_guid',
	'value' => $vars['container_guid'],
));

echo elgg_view('input/submit', array('value' => elgg_echo('save')));

echo '</div>';
