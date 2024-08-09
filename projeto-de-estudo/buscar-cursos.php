<?php
use \GuzzleHttp\Client;

$client = new Client();
$resposta = $client->request(method:'GET', uri:'https://cursos.alura.com.br/courses');

$html = $resposta->getBody();

$crawler = new Crawler();
$crawler->addHtmlContent($html);

$cursos = $crawler-> filter(selector: 'span.card-curso__nome');

foreach ($cursos as $curso) {
    echo $curso->textContent .PHP_EOL;
}