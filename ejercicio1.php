<?php
//No conozco mucho sobre webscrapping en php (lo trabajé en python con unos amigos en la universidad), pero ya tengo la página web en una variable
//sería cuestión de averiguar como llegar a la etiqueta pedida

$doc = new \DOMDocument();
$doc->load(file_get_contents('https://articulo.mercadolibre.com.pe/MPE-617289572-dell-alienware-m15-r7-ryzen-9-rtx-3070ti-8gb-1tb-32gb-ram-_JM'));
$xpath = new \DOMXPath($doc);

//var_dump($xpath);

$precio = $xpath->evaluate('//span[@class="andes-money-amount__fraction"]');
var_dump($precio);
