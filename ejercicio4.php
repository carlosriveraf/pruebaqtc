<?php

//Ejercicio nro 4
function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    //return $result;
    return json_decode($result);
}

$pokemones = CallAPI('get', 'https://pokeapi.co/api/v2/pokemon?limit=100000&offset=0');
//var_dump($pokemones);

$random = rand(1, $pokemones->count);

$pokemon = $pokemones->results[$random - 1];
$caracteristicas = CallAPI('get', $pokemon->url);
//var_dump($caracteristicas);

$random = rand(1, count($caracteristicas->abilities));

$habilidades = $caracteristicas->abilities[$random - 1];
$habilidad = CallAPI('get', $habilidades->ability->url);
//var_dump($habilidad);

foreach ($habilidad->flavor_text_entries as $value) {
    if ($value->language->name == 'es') {
        echo $value->flavor_text;
        break;
    }
}

foreach ($habilidad->names as $value) {
    if ($value->language->name == 'es') {
        echo ' (' . $value->name . ')';
        break;
    }
}
