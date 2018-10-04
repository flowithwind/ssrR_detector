<?php
define("ROOT_PATH", dirname( dirname(__FILE__)) );
define("CONF_PATH", ROOT_PATH ."/config/");
define("DATA_PATH", ROOT_PATH ."/data/");

$file = DATA_PATH . "/server.json";
$entity = json_decode(file_get_contents($file),true);
$url = '';
foreach ($entity as $key => $v) {
	$url .= getSsrUrl($v['main_ip']) . "\r\n";
}

echo $url;

function getSsrUrl($ip){
	$pattern = "$ip:7086:origin:chacha20:tls1.2_ticket_auth:R2djakRzczFA/?obfsparam=&protoparam=&remarks=5paw5pyN5Yqh5Zmo&group=auto";
	$url = "ssr://" . rtrim( base64_encode($pattern) , "=");
	return $url;
}
