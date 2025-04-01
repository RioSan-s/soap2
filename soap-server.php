<?php

// Явно указываем, что это SOAP-сервер
if (isset($_GET['wsdl'])) {
    header('Content-Type: application/wsdl+xml');
    readfile('service.wsdl');
    exit;
}
class ExampleService
{
    /**
     * @param object|string $name
     * @return string
     */
    public function sayHello($name)
    {
    $name = is_object($name) ? ($name->name ?? 'Гость') : $name;
     return ['greeting'=>'Привет '.(string)$name];
    }

    public function getDate()
    {
     return ['date'=>'Сегодня: '.date('d/m/y H:i')];
    }
}
// Инициализация SOAP-сервера
$server = new SoapServer("service.wsdl");
$server->setClass("ExampleService");
$server->handle();