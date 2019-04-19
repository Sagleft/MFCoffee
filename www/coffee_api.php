<?php
	require_once __DIR__ . "/../coffee_config.php";
	require_once __DIR__ . "/../src/coffee_functions.php";
	$cache_path = __DIR__ . "/../coffee_cache.json";
	$coffee_rate = getCoffeeRate($cache_path, $config['coffee_rub']);
	
	echo json_encode([
		'coffee_mfc' => $coffee_rate['coffee_mfc'],
		'rate_delta' => $coffee_rate['rates_delta']
	]);
	