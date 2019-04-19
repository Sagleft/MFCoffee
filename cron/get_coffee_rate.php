<?php
	//обновление кеша данных от Coinlib
	require_once __DIR__ . "/../coffee_config.php";
	require_once __DIR__ . "/../src/coffee_functions.php";
	$cache_path = __DIR__ . "/../coffee_cache.json";
	//$last_rates = [];
	$api_url = "https://coinlib.io/api/v1/coin?key=" . $config['api_key'] . "&pref=RUB&symbol=MFC";
	/* if(file_exists($cache_path)) {
		$last_json = file_get_contents($cache_path);
		if($last_json != "") {
			$last_rates = json_decode($last_json, true);
		}
		//забыл зачем хотел сделать загрузку старых данных
	} */
	
	$new_json  = curl_get($api_url);
	//TODO: проверки json
	//$new_rates = json_decode($new_json, true);
	file_put_contents($cache_path, $new_json);
	