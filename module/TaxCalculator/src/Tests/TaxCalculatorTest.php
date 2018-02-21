<?php

/**
 * Created by PhpStorm.
 * User: fadel
 * Date: 21/02/2018
 * Time: 15:06
 */

namespace TaxCalculator\Tests;

use PHPUnit\Framework\TestCase;
use TaxCalculator\Tax;

class TaxCalculatorTest extends TestCase {


    private $edges = [
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

    public function dataProvider()
    {
        return [
            [75000000, 6250000],
            [750000000, 170000000]
        ];
    }


    /**
     * @param $salary
     * @param $annualIncome
     * @dataProvider dataProvider
     */
    public function testCalcTax($salary, $annualIncome )
    {
        $annualTax = (new Tax($this->edges, $salary))->calcTax();
        $this->assertEquals($annualIncome, $annualTax);
    }
}