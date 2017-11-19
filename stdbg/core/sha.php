<?php

/**
 * sha short summary.
 *
 * sha description.
 *
 * @version 1.0
 * @author Antonio Souza
 */
class Sha
{

	public static function sha512($value) {
		if(isset($value) || $value != null) {
			return hash('sha512', $value);
		}
		return null;
	}

}