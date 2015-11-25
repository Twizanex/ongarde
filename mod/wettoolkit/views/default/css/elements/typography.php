<?php
/**
 * CSS typography
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>

.elgg-heading-main {
	float: left;
	max-width: 530px;
	margin-top:12px;
}

pre, code {
	font-family: Monaco, "Courier New", Courier, monospace;
	font-size: 12px;
	
	background:#EBF5FF;
	color:#000000;
	overflow:auto;

	overflow-x: auto; /* Use horizontal scroller if needed; for Firefox 2, not needed in Firefox 3 */

	white-space: pre-wrap;
	word-wrap: break-word; /* IE 5.5-7 */
	
}

pre {
	padding:3px 15px;
	margin:0px 0 15px 0;
	line-height:1.3em;
}

code {
	padding:2px 3px;
}

.elgg-monospace {
	font-family: Monaco, "Courier New", Courier, monospace;
}

.elgg-subtext {
	color: #666666;
	font-size: 85%;
	line-height: 1.2em;
	font-style: italic;
}

.elgg-text-help {
	display: block;
	font-size: 85%;
	font-style: italic;
}

.elgg-quiet {
	color: #666;
}

.elgg-loud {
	color: #0054A7;
}

/* ***************************************
	USER INPUT DISPLAY RESET
*************************************** */
