<?php
require_once("./provider/VultrProvider.php");

define("ROOT_PATH", dirname( dirname(__FILE__)) );
define("CONF_PATH", ROOT_PATH ."/config/");
define("DATA_PATH", ROOT_PATH ."/data/");

mkdir(DATA_PATH);

$config = require_once(CONF_PATH. "/provider.config.php");

$pro = new VultrProvider($config['vultr.com']);
$res =json_decode( $pro->serverList(),true);

$destroy_devices = array();
$ok_devices = array();

$fd = fopen(DATA_PATH . "/server.json", 'w+');
if($fd == null) {
	printf("create server.ini failed");
	exit(1);
}

foreach($res as $key => $t){
	$ip = $t['main_ip'];
	exec("ping -c 2 $ip", $unsed ,$retv);
	if($retv == 0){
		//everything is all right.
		$ok_devices[$key] = $t;
	}else {
		$destroy_devices[$key] = $t;
		$pro->serverDestroy($t['SUBID']);
	}
}

fwrite($fd, json_encode($ok_devices));
fclose($fd);


$entity = array_keys($ok_devices);
if(empty($ok_devices)){
	$tmp = json_decode( $pro->serverCreate(), true);
	$entity[] = $TMP['SUBID'];
}

var_dump($ok_devices, $destroy_devices, $entity);


