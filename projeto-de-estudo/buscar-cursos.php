<?php
use \GuzzleHttp\Client;

$client = new Client();
$resposta = $client->request(method:'GET', uri:'https://cursos.alura.com.br/courses');

$html = $resposta->getBody();
