<?php
/*
phpinfo();
exit;
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Устанавливаем параметр, чтобы curl возвращал данные, вместо того, чтобы выводить их в браузер.
	curl_setopt($ch, CURLOPT_URL, 'http://erotic-massage-egostudio.com/index3.html');

	$data = curl_exec($ch);
	curl_close($ch);
print_r($data);
echo 90;
exit;
*/
require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('backend', 'prod', false);
sfContext::createInstance($configuration)->dispatch();
