<?php
try {
    $client = new SoapClient("service.wsdl");
    $response = $client->sayHello(["name" => "Мир"]);
    echo $client->getDate()->date;
    echo $response->greeting; // Выведет: Привет, Мир!
} catch (SoapFault $e) {
    echo "Ошибка: " . $e->getMessage();
}