<?php
require 'vendor/autoload.php';
require 'src/Buscador.php';

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();
$resposta = $client->request(method:'GET', uri:'https://cursos.alura.com.br/courses');

$html = $resposta->getBody();

$crawler = new Crawler();
$crawler->addHtmlContent($html);

$cursos = $crawler-> filter(selector: 'span.card-curso__nome');

foreach ($cursos as $curso) {
    echo $curso->textContent .PHP_EOL;
}