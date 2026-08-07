<?php

$result = null;
$error = null;

$to_meters = [
    "mm" => 0.001,
    "cm" => 0.01,
    "m" => 1,
    "km" => 1000,
    "inch" => 0.0254,
    "foot" => 0.3048,
    "yard" => 0.9144,
    "mile" => 1609.34
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $value = floatval($_POST["value"]);
    $from_unit = $_POST["from-unit"];
    $to_unit = $_POST["to-unit"];
    $meters = $value * $to_meters[$from_unit];
    $result = round($meters / $to_meters[$to_unit], 4);
}
?>