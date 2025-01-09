<?php

namespace DataFoodConsortium\Connector;
use DataFoodConsortium\Connector\DataCapure;

$url = "https://api.example.com/json-ld/";
putenv("EXPERIMENTAL_DATA_CAPTURE_ENABLED=true");
putenv("EXPERIMENTAL_DATA_CAPTURE_EXPORT_URL=" . $url);

$connector = new Connector();
$capture = new DataCapure();
$connector->attach($capture, "export");

$json = $connector->export([
  new Address(
    connector: $connector,
    street: "123 Sesame Street",
    postalCode: "ABCDEFG",
    city: "The City",
    country: "Hensonia",
  ),
  new Address(
    connector: $connector,
    street: "742 Evergreen Terrace",
    postalCode: "666",
    city: "Springfield",
    country: "USA",
  ),
]);

print_r(json_decode($json));
