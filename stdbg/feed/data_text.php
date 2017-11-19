<?php

/**
 * DataText short summary.
 *
 * DataText description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class DataText
{
    
	public function __construct($type, $content, $font_size) {
	
		self::set_type($type);
		self::set_content($content);
		self::set_font_size($font_size);

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

	private static $font_size;
	public function get_font_size() {
		return self::$font_size;
	}
	
	private function set_font_size($value) {
		self::$font_size = $value;
	}

}