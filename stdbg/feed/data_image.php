<?php

/**
 * data_image short summary.
 *
 * data_image description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class DataImage
{
    
	public function __construct($type, $content, $title, $gallery) {
		
		self::set_type($type);
		self::set_content($content);
		self::set_title($title);
		self::set_gallery($gallery);

	}

	private static $type;
	public function get_type() {
		return self::$type;
	}

	private function set_type($value) {
		self::$type = $value;
	}

	private static $content;
	public function get_content() {
		return self::$content;
	}
	
	private function set_content($value) {
		self::$content = $value;
	}

	private static $title;
	public function get_title() {
		return self::$title;
	}
	
	private function set_title($value) {
		self::$title = $value;
	}

	private static $gallery;
	public function get_gallery() {
		return self::$gallery;
	}
	
	private function set_gallery($value) {
		self::$gallery = $value;
	}

}