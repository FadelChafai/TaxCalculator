<?php
/**
 * Created by PhpStorm.
 * User: fadel
 * Date: 21/02/2018
 * Time: 15:44
 */

namespace TaxCalculator;

class Tax
{
    /**
     * edges which have their own tax rate
     * Ex : 0 to Rp 50,000,000 the tax rate is 5%.
     * @var  $edges array
     */
    private $edges;

    /**
     * Annual taxable income
     * @var  $salary float
     */
    private $salary;

    public function __construct(array $edge, float $salary)
    {
        $this->edges = $edge;
        $this->salary = $salary;
    }

    /**
     * @return float
     */
    function calcTax(): float {

        foreach ($this->edges as $index => $input) {

            if((empty($input['edge'][1]) && $this->salary > $input['edge'][0]) ||
                ($this->salary >= $input['edge'][0] && $this->salary < $input['edge'][1])) {

                return $this->getAnnualTax($index, $this->salary);
            }
        }
    }

    /**
     * @param int $index
     * @param $salary
     * @return float
     */
    private function getAnnualTax(int $index, $salary) : float {

        $amount = 0;

        for($i=0; $i <= $index; $i++) {

            if($i == $index) {
                $amount += (($salary - $this->edges[$i]['edge'][0]) * $this->edges[$i]['rate'])/100;
            }else{
                $amount += (($this->edges[$i]['edge'][1] - $this->edges[$i]['edge'][0]) * $this->edges[$i]['rate'])/100;
            }
        }
        return $amount;
    }
}