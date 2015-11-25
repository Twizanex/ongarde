<?php 

	$widget = elgg_extract("entity", $vars);
	
	// get widget settings
	$count = (int) $widget->blog_count;
	if($count < 1){
		$count = 8;
	}

	// get view mode
	$view_mode = $widget->view_mode;
	
	// backup context and set
	switch($view_mode){
		case "slider":
			elgg_push_context("slider");
			break;
		case "preview":
			elgg_push_context("preview");
			break;
		case "simple":
			elgg_push_context("simple");
			break;
		default:
			elgg_push_context("listing");
			break;
	}
	
	$options = array(
		"type" => "object",
		"subtype" => "blog",
		"limit" => $count,
		"full_view" => false,
		"pagination" => false,
		"view_type_toggle" => false,
		"metadata_name_value_pairs" => array()
	);
	
	// only show published blogs to non admins
	if(!elgg_is_admin_logged_in()){
		$options["metadata_name_value_pairs"][] = array(
			"name" => "status",
			"value" => "published"
		);
	}
	
	// limit to featured blogs?
	if($widget->show_featured == "yes") {
		$options["metadata_name_value_pairs"][] = array(
			"name" => "featured",
			"value" => true
		);
	}
	echo "<section class='widget-content-body'>"
		 . "<h2 class='mrgn-tp-0'>" . elgg_echo('ongarde:newsroom') . "</h2>";
	if($blogs = elgg_get_entities_from_metadata($options)) {
			foreach($blogs as $blog){
				echo "<article class='widget-item blog clearfix'>
						<div class='col-md-4 col-sm-4'>
							<img src=".$blog->getIconURL('large')." class='img-responsive'/>
						</div>
						<div class='col-md-8 col-sm-8'>
							<h3 class='mrgn-tp-0'>".$blog->title."</h3>
							<p>$blog->description</p>
						</div>
					</article>";
			}
	} else {
		echo elgg_echo("blog:noblogs");
	}
	echo "</section>";
	// restore context
	elgg_pop_context();
	