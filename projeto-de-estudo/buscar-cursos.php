<?php
require 'vendor/autoload.php';

use \GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();
$resposta = $client->request(method:'GET', uri:'https://www.alura.com.br/cursos-online-programacao/php');
$html = $resposta->getBody();

$crawler = new Crawler();
$crawler->addHtmlContent($html);

$cursos = $crawler-> filter(selector: 'span.card-curso__nome');

foreach ($cursos as $curso) {
    echo $curso->textContent .PHP_EOL;
}