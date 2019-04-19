# MFCoffee
Сколько стоит пачка молотого кофе в MFC? :D

## Смысл
Вместо "админу на пиво" писать "разрабу на кофе" и через данный API получать информацию о цене пачки кофе для формирования минимальной или требуемой суммы.

## API запрос
```
http://mfcoin.su/coffee_api
```
Пример ответа
{"coffee_mfc":"196.51","rate_delta":-3.18}
где
* coffee_mfc - курс пачки кофе в MFC;
* rate_delta - изменение курса в % за 24 часа;

## Установка
Необходим PHP >=5.6

```
composer update
mkdir cache
mv coffee_config_example.php coffee_config.php
touch coffee_cache.json
```
Затем установить задание в cron на запуск cron/get_coffee_rate.php где-нибудь раз в час.

По желанию для Apache:
```
mv www/example.htaccess www/.htaccess
```
