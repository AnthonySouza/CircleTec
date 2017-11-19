<?php

/**
 * device short summary.
 *
 * device description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class Device
{

	public static function GET_IP() {
		return $_SERVER['REMOTE_ADDR'];
	}

	public static function GET_USER_AGENT() {
		return $_SERVER['HTTP_USER_AGENT'];
	}

}