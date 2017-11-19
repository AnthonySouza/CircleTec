<?php


function GenerateString($length, $chars) {
	$res = '';
	for ($i = 0; $i < $length; $i++)
	{
		$res .= $chars[rand(0, strlen($chars) - 1)];
	}
	return $res;
}