<?php

/**
 * image short summary.
 *
 * image description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class UploadedImage
{
    
	public function __construct($data) {
	
		if(isset($data) || $data != null) {
		
			self::set_id($data->data->id);
			self::set_title($data->data->title);
			self::set_description($data->data->description);
			self::set_datetime($data->data->datetime);
			self::set_type($data->data->type);
			self::set_animated($data->data->animated);
			self::set_width($data->data->width);
			self::set_height($data->data->height);
			self::set_size($data->data->size);
			self::set_views($data->data->views);
			self::set_bandwidth($data->data->bandwidth);
			self::set_vote($data->data->vote);
			self::set_favorite($data->data->favorite);
			self::set_nfsw($data->data->nsfw);
			self::set_section($data->data->section);
			self::set_account_url($data->data->account_url);
			self::set_account_id($data->data->account_id);
			self::set_is_ad($data->data->is_ad);
			self::set_in_most_viral($data->data->in_most_viral);
			self::set_has_sound($data->data->has_sound);
			self::set_tags($data->data->tags);
			self::set_ad_type($data->data->ad_type);
			self::set_ad_url($data->data->ad_url);
			self::set_in_gallery($data->data->in_gallery);
			self::set_deletehash($data->data->deletehash);
			self::set_name($data->data->name);
			self::set_link($data->data->link);
		
		}
	
	}

	private static $id;
	public function get_id() {
		return self::$id;
	}

	private function set_id($value) {
		self::$id = $value;
	}

	private static $title;
	public function get_title() {
		return self::$title;
	}

	private function set_title($value) {
		self::$title = $value;
	}

	private static $description;
	public function get_description() {
		return self::$description;
	}

	private function set_description($value) {
		self::$description = $value;
	}

	private static $datetime;
	public function get_datetime() {
		return self::$datetime;
	}

	private function set_datetime($value) {
		self::$datetime = $value;
	}

	private static $type;
	public function get_type() {
		return self::$type;
	}

	private function set_type($value) {
		self::$type = $value;
	}

	private static $animated;
	public function get_animated() {
		return self::$animated;
	}

	private function set_animated($value) {
		self::$animated = $value;
	}

	private static $width;
	public function get_width() {
		return self::$width;
	}

	private function set_width($value) {
		self::$width = $value;
	}

	private static $height;
	public function get_height() {
		return self::$height;
	}

	private function set_height($value) {
		self::$height = $value;
	}

	private static $size;
	public function get_size() {
		return self::$size;
	}

	private function set_size($value) {
		self::$size = $value;
	}

	private static $views;
	public function get_views() {
		return self::$views;
	}

	private function set_views($value) {
		self::$views = $value;
	}

	private static $bandwidth;
	public function get_bandwidth() {
		return self::$bandwidth;
	}

	private function set_bandwidth($value) {
		self::$bandwidth = $value;
	}

	private static $vote;
	public function get_vote() {
		return self::$vote;
	}

	private function set_vote($value) {
		self::$vote = $value;
	}

	private static $favorite;
	public function get_favorite() {
		return self::$favorite;
	}

	private function set_favorite($value) {
		self::$favorite = $value;
	}

	private static $nfsw;
	public function get_nfsw() {
		return self::$nfsw;
	}

	private function set_nfsw($value) {
		self::$nfsw = $value;
	}

	private static $section;
	public function get_section() {
		return self::$section;
	}

	private function set_section($value) {
		self::$section = $value;
	}

	private static $account_url;
	public function get_account_url() {
		return self::$account_url;
	}

	private function set_account_url($value) {
		self::$account_url = $value;
	}

	private static $account_id;
	public function get_account_id() {
		return self::$account_id;
	}

	private function set_account_id($value) {
		self::$account_id = $value;
	}

	private static $is_ad;
	public function get_is_ad() {
		return self::$is_ad;
	}

	private function set_is_ad($value) {
		self::$is_ad = $value;
	}

	private static $in_most_viral;
	public function get_in_most_viral() {
		return self::$in_most_viral;
	}

	private function set_in_most_viral($value) {
		self::$in_most_viral = $value;
	}

	private static $has_sound;
	public function get_has_sound() {
		return self::$has_sound;
	}

	private function set_has_sound($value) {
		self::$has_sound = $value;
	}

	private static $tags;
	public function get_tags() {
		return self::$tags;
	}

	private function set_tags($value) {
		self::$tags = $value;
	}

	private static $ad_type;
	public function get_ad_type() {
		return self::$ad_type;
	}

	private function set_ad_type($value) {
		self::$ad_type = $value;
	}

	private static $ad_url;
	public function get_ad_url() {
		return self::$ad_url;
	}

	private function set_ad_url($value) {
		self::$ad_url = $value;
	}

	private static $in_gallery;
	public function get_in_gallery() {
		return self::$in_gallery;
	}

	private function set_in_gallery($value) {
		self::$in_gallery = $value;
	}

	private static $deletehash;
	public function get_deletehash() {
		return self::$deletehash;
	}

	private function set_deletehash($value) {
		self::$deletehash = $value;
	}

	private static $name;
	public function get_name() {
		return self::$name;
	}

	private function set_name($value) {
		self::$name = $value;
	}

	private static $link;
	public function get_link() {
		return self::$link;
	}

	private function set_link($value) {
		self::$link = $value;
	}

}