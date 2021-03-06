<?php

echo "<p class='et-admin-red'><strong>You need to complete this form, and 'SAVE', before EasyTheme is ready to use.</strong></p><p>[1] First choose your <strong>HEADER IMAGE</strong> and save it as headimg.jpg in 'mod/easytheme/graphics'. <em>(Choose your image carefully - make sure it is the right width and height for the header of your page.)</em></p><p>[2] How wide is your image? <em> - this determines the Width of the Centred panel (Theme default = 990px) (Elgg default = 100%)</em></p> ";

if(empty($vars['entity']->etpgwidth)){
$vars['entity']->etpgwidth = "1264px";
}

echo elgg_view('input/text', array( 'name' => 'params[etpgwidth]',
'value' => $vars['entity']->etpgwidth,
'class' => 'easytheme', ) );

                                   
echo "<br /><br /><p>[3] How high is your image? <em>(Theme default = 295px)</em></p>";


	if(empty($vars['entity']->etheadh)){
	$vars['entity']->etheadh = "295px";
	}

echo elgg_view('input/text', array(     'name' => 'params[etheadh]', 
                                        'value' => $vars['entity']->etheadh,
                                        'class' => 'easytheme', ) ); 
                                        
echo "<br /><br /><p>[4] What colour do you want for the menu bar background? <em>(Theme default = #181a2f).</em></p>";


echo elgg_view('input/text', array(     'name' => 'params[etmenu]', 
                                        'value' => $vars['entity']->etmenu,
                                        'class' => 'easytheme', ) );  
                                        
 echo "<br /><br /><p>[6] Centre panel :: What width do you want for the left and right border? <em>(Theme default = 1px)  (No border = 0px).</em></p>";


	if(empty($vars['entity']->etborderwidth)){
	$vars['entity']->etborderwidth = "1px";
	}

echo elgg_view('input/text', array(     'name' => 'params[etborderwidth]', 
                                        'value' => $vars['entity']->etborderwidth,
                                        'class' => 'easytheme', ) ); 
                                        
                                        
                                                                               
 echo "<br /><br /><p>[7] Centre panel :: What colour do you want for the left and right border? <em>(Theme default = #00000).</em></p>";


	if(empty($vars['entity']->etborder)){
	$vars['entity']->etborder = "#000000";
	}

echo elgg_view('input/text', array(     'name' => 'params[etborder]', 
                                        'value' => $vars['entity']->etborder,
                                        'class' => 'easytheme', ) );                                        
                                        
                                        
                                        
                                        
  echo "<br /><br /><p>[8] Centre panel :: Change the left and right shadow? <em>(Theme default = 10px) (No shadow = 0px).</em></p>";


	if(empty($vars['entity']->etshadow)){
	$vars['entity']->etshadow = "10px";
	}

echo elgg_view('input/text', array(     'name' => 'params[etshadow]', 
                                        'value' => $vars['entity']->etshadow,
                                        'class' => 'easytheme', ) );                                        
                                                                              
                                        



echo "<br /><br /><p>[9] For the <strong>PAGE BACKGROUND</strong>:<br />  Open <strong>'mod/easytheme/graphics/bkgr.gif'</strong> in your graphics software, and edit the colours. See my tutorial at <a class='et-admin-red' href=\"http://www.jubo.co.uk/blog/2011/11/easy-theme-1-2-elgg-1-8-theme\" target=\"_blank\">jubo.co.uk</a><br />Then... save your image as bkgr.gif in 'mod/easytheme/graphics'. <br /><em>(Or you could replace this image with a repeating image of your choice - any size - just name it 'bkgr.gif'.)</em></p><br /><p>[10] If you want a different <strong>SIDEBAR</strong> colour:<br /> Open <strong>'mod/easytheme/graphics/sidebar_background.gif'</strong> and change the colour of the grey section<br />Then... save your image as sidebar_background.gif in 'mod/easytheme/graphics'.</p><br />"; 
                                   

                                  
echo "<p>[11] Footer :: height <em>(Theme default = 100px)</em></p> ";    

	if(empty($vars['entity']->etfooth)){
	$vars['entity']->etfooth = "100px";
	}
                                    
echo elgg_view('input/text', array(     'name' => 'params[etfooth]', 
                                        'value' => $vars['entity']->etfooth,
                                        'class' => 'easytheme', ) ); 


echo "<br /><br /><p>[12] Footer :: background colour <em>(Theme default = #181a2f)</em></p> ";   

	if(empty($vars['entity']->etfootbk)){
	$vars['entity']->etfootbk = "#181a2f";
	}
                                     
echo elgg_view('input/text', array(     'name' => 'params[etfootbk]', 
                                        'value' => $vars['entity']->etfootbk,
                                        'class' => 'easytheme', ) ); 


                                        
echo "<br /><br /><p>[13] Footer :: text colour <em>(Theme default = #999)</em></p> ";      

	if(empty($vars['entity']->etfoottext)){
	$vars['entity']->etfoottext = "#999";
	}
                                  
echo elgg_view('input/text', array(     'name' => 'params[etfoottext]', 
                                        'value' => $vars['entity']->etfoottext,
                                        'class' => 'easytheme', ) ); 



echo "<br /><br /><p>[14] Footer :: link colour <em> (Theme default = #ccc)</em></p> ";             

	if(empty($vars['entity']->etfootlink)){
	$vars['entity']->etfootlink = "#ccc";
	}
                           
echo elgg_view('input/text', array(     'name' => 'params[etfootlink]', 
                                        'value' => $vars['entity']->etfootlink ,
                                        'class' => 'easytheme', ) ); 


echo "<br /><br /><p>[15] Footer :: link hover colour <em>(Theme default = #666)</em></p> ";  

	if(empty($vars['entity']->etfoothov)){
	$vars['entity']->etfoothov = "#666";
	}
                                                             
echo elgg_view('input/text', array(     'name' => 'params[etfoothov]', 
                                        'value' => $vars['entity']->etfoothov,
                                        'class' => 'easytheme', ) ); 

echo "<br /><br /><p>[16] Text & Buttons Colour (1) <em>(Theme default = #2f5980)</em></p> ";   

	if(empty($vars['entity']->etcolor1)){
	$vars['entity']->etcolor1 = "#2f5980";
	}
                                              
echo elgg_view('input/text', array(     'name' => 'params[etcolor1]', 
                                        'value' => $vars['entity']->etcolor1,
                                        'class' => 'easytheme', ) ); 

echo "<br /><br /><p>[17] Text & Buttons Colour (2) <em>(Theme default = #a95e27)</em></p> ";          

	if(empty($vars['entity']->etcolor2)){
	$vars['entity']->etcolor2 = "#a95e27";
	}
                                        
echo elgg_view('input/text', array(     'name' => 'params[etcolor2]', 
                                        'value' => $vars['entity']->etcolor2,
                                        'class' => 'easytheme', ) ); 


echo "<br /><br /><p>[18] Custom Index :: Module top bar colour <em>(Theme default = #181a2f)</em></p> ";              

	if(empty($vars['entity']->etmod)){
	$vars['entity']->etmod = "#181a2f";
	}
                                      
echo elgg_view('input/text', array(     'name' => 'params[etmod]', 
                                        'value' => $vars['entity']->etmod,
                                        'class' => 'easytheme', ) ); 


echo "<br /><br /><p>[19] <strong> To Replace the site name with a Logo image</strong> <em>(optional)</em>:<br />~ Save your logo in 'mod/easytheme/graphics' <br /> ~ Open the file 'mod/easytheme/views/default/page/elements/header_logo.php'<br /> ~ Remove the 'h1' tags, and everything in between.<br /> ~ Replace with the code for your logo image.<br /> ~ Save the file.</p><br /><p>[20] <strong>To change the Favicon icon</strong> <em>(optional)</em>: Swap your sites icon with the elgg favicon icon in <strong>'mod/easytheme/graphics'</strong></p><br /><br /><p>[21] <strong>Site Introduction</strong> Write a short introduction to your site - <em>(This will appear at the top of the custom index page.  Be careful to copy/paste from a text file - otherwise it's easy to paste unwanted mark-up into the box.)</em></p>";

$myFile = elgg_get_data_path() . "easytheme/intro.php";
$fh = fopen($myFile, 'r');
$etintrofile = fread($fh, filesize($myFile));
fclose($fh);

echo elgg_view('input/longtext', array( 'name' => 'params[etintro]', 
                                        'value' => $etintrofile,
                                        'class' => 'easytheme', ) ); 



echo"<br /><p class='et-admin-red'><strong>Now save your settings.</strong></p>";
