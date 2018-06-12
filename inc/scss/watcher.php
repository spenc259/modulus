<?php

function scss_compile_check() {

	/* If any changes have been made to any scss files, recompile */

	$has_changes = false;
	$scss_files = get_template_directory() . '/assets/scss/';
	$input_files = array();

	/* Loop through all folders and subfolders in */
	$di = new RecursiveDirectoryIterator($scss_files);
	foreach (new RecursiveIteratorIterator($di) as $file) {

		if ( pathinfo($file->getFilename(), PATHINFO_EXTENSION) == 'scss' ) {
			array_push($input_files, $file->getPathname());
		}

	}

	$filelist = glob( get_stylesheet_directory() . "/assets/scss/" . "*.scss" );

	foreach ($input_files as $file_path) {

		$css_path = get_stylesheet_directory() . "/assets/css/" . "main.css";

		if (! realpath($css_path) or filemtime($file_path) > filemtime($css_path)) {
			$has_changes = true;
			break;
		}

	}

	if ($has_changes) {
		$css_files = get_template_directory() . '/assets/css/';
		$compile_method = 'Leafo\ScssPhp\Formatter\Nested';
		$scss = new scss($scss_files, $css_files, $compile_method);
		$scss->compile();
	}

}

?>