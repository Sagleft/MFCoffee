<?php
	function cURL($url, $ref, $header, $cookie, $p=null){
		$ch =  curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		if(isset($_SERVER['HTTP_USER_AGENT'])) {
			curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		}
		curl_setopt($ch, CURLOPT_REFERER, $ref);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		if($cookie != '') {
			curl_setopt($ch, CURLOPT_COOKIE, $cookie);
		}
		if ($p) {
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $p);
		}
		$result =  curl_exec($ch);
		curl_close($ch);
		if ($result){
			return $result;
		} else {
			return '';
		}
	}
	
	function curl_get($url) {
		return cURL($url, '', '', '');
	}
	
	function getCoffeeRate($cache_path, $coffee_rub) {
		$json = file_get_contents($cache_path);
		//TODO: разные проверки
		$coffee_rates = json_decode($json, true);
		$MFC_RUB = $coffee_rates['price'];
		$coffee_mfc = number_format($coffee_rub / $MFC_RUB, 2, '.', ' ');
		
		$rates_delta = $coffee_rates['delta_24h']+0;
		$delta_symb = "down";
		if($rates_delta < 0) {
			//курс MFC упал, значит цена на кофе в MFC выросла
			$delta_symb = "up";
		}
		$rates_delta = (-1) * $rates_delta; //переводим в изменение цены на кофе
		
		return [
			'coffee_mfc'  => $coffee_mfc,
			'rates_delta' => $rates_delta,
			'delta_symb'  => $delta_symb
		];
	}
	