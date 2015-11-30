<?php
/**
 * Elgg publications widget
 *
 * @package ElggPages
 */
$options = array(
	'type' => 'object',
	'subtype' => 'publication',
	'limit' => 5,
	'full_view' => FALSE,
	'pagination' => FALSE,
);
$publications = elgg_get_entities($options);

echo "<section class='widget-content-body'>";
echo "<div class='col-lg-12'><h2 class='mrgn-tp-0'>".elgg_echo('publications')."</h2></div>";

if ($publications) {
	foreach($publications as $publication) {
		echo "<article class='widget-item publication clearfix'>
				<div class='col-md-5 col-sm-5 article-image'>
					<img src=".$publication->getIconURL('large')." class='img-responsive'/>
				</div>
				<div class='col-md-7 col-sm-7'>
					<div class='tags'>";
						reset($publication->tags);
						$end = end($publication->tags);
						foreach($publication->tags as $tag) {
							if($tag == $end) {
								echo "<a href='search?q={$tag}&search_type=tags'>".$tag."</a>";
							}
							else{
								echo "<a href='search?q={$tag}&search_type=tags'>".$tag."</a> <span>&#9899</span> ";
							}
						}
					echo "</div>
					<h4 class='mrgn-tp-0'><a href='".$publication->getURL()."'>".$publication->title."</a></h4>
				</div>
			</article>";
	}
}
else{
	echo elgg_echo('publications:none');
}
echo "</section>";