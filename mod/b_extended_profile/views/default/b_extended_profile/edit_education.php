<?php
/*
 * Author: Bryden Arndt
 * Date: 01/07/2015
 * Purpose: Create the ajax view for editing the education entries.
 * Requires: gcconnex-profile.js in order to handle the add more and delete buttons which are triggered by js calls
 */

if (elgg_is_xhr()) {  //This is an Ajax call!
    // allow the user to edit the access settings for education entries
    echo elgg_echo('gcconnex_profile:education:access');
    $user_guid = $_GET["guid"];
    $user = get_user($user_guid);

    $access_id = $user->education_access;

    $params = array(
        'name' => "accesslevel['education']",
        'value' => $access_id,
        'class' => 'gcconnex-education-access'
    );

    echo elgg_view('input/access', $params);

    //get the array of user education entities
    $education_guid = $user->education;

    echo '<div class="gcconnex-education-all">';

    // handle $education_guid differently depending on whether it's an array or not
    if (is_array($education_guid)) {
        foreach ($education_guid as $guid) { // display the input/education view for each education entry
            if ( $guid != null ) {
                echo elgg_view('input/education', array('guid' => $guid));
            }
        }
    }
    else {
        if ($education_guid != null && !empty($education_guid)) {
            echo elgg_view('input/education', array('guid' => $education_guid));
        }
    }


    echo '</div>';

    // create an "add more" button at the bottom of the education input fields so that the user can continue to add more education entries as needed
    echo '<div class="gcconnex-education-add-another elgg-button elgg-button-profile btn" data-type="education" onclick="addMore(this)">' . elgg_echo('gcconnex_profile:education:add') . '</div>';
}

else {  // In case this view will be called via elgg_view()
    echo 'An error has occurred. Please ask the system administrator to grep: DZZZNSJ662277';
}

?>