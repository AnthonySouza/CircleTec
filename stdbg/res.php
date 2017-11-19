<?php

require_once 'init.php';

require_once _CORE_ROOT_ . 'page.php';
require_once _CORE_ROOT_ . 'method.php';

if($resource = get_method_value(GET, 'file')) {
	
	if($file = file_get_contents(RESOURCES_SERVER . $resource)) {
	
		if($ext = pathinfo(RESOURCES_SERVER . $resource, PATHINFO_EXTENSION)) {
			
			//ob_start();

			print $file;
			//include RESOURCES_SERVER . $resource;

			//ob_end_flush();

			//header('Cache-control: must-revalidate');

			switch ($ext)
			{
				case 'css':
					header("Content-type: text/css; charset: UTF-8");
					break;
				case 'js':
					header("Content-type: text/javascript; charset: UTF-8");
					break;
			}

		}

	}
}