<?php
	require_once __DIR__ . "/../coffee_config.php";
	require_once __DIR__ . "/../src/coffee_functions.php";
	$cache_path = __DIR__ . "/../coffee_cache.json";
	$coffee_rate = getCoffeeRate($cache_path, $config['coffee_rub']);
	
	$data = [
		'title'       => 'MFCoffee',
		'tag'         => 'coffee',
		'coffee_rate' => $coffee_rate['coffee_mfc'],
		'delta'       => $coffee_rate['rates_delta'],
		'delta_symb'  => $coffee_rate['delta_symb'],
		'rand_video'  => rand(1, 2)
	];
	require_once __DIR__ . '/../src/coffee_twig.php';
	