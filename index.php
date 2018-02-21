<?php

require 'vendor/autoload.php';

use TaxCalculator\Tax;

$edges = [
    [
        'edge' => [0, 50000000],
        'rate' => 5
    ],
    [
        'edge' => [50000000, 250000000],
        'rate' => 15
    ],
    [
        'edge' => [250000000, 500000000],
        'rate' => 25
    ],
    [
        'edge' => [500000000],
        'rate' => 30
    ]
];

$salary = 75000000;


$taxAmount = (new Tax($edges, $salary))->calcTax();

echo 'Your annual income tax amount is : '.$taxAmount.PHP_EOL;

