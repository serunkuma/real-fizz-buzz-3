<?php
namespace RealFizzBuzz\Test;
require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use RealFizzBuzz\RealFizzBuzz as RealFizzBuzz;

class RealFizzBuzzTest extends TestCase {
    public function testStep1(){
        $input = range(1, 20);
        $output = RealFizzBuzz::step1(range(1,20));
        $this->assertEquals(
            '1 2 fizz 4 buzz fizz 7 8 fizz buzz 11 fizz 13 14 fizzbuzz 16 17 fizz 19 buzz',
            $output,
            "The output should match: '1 2 fizz 4 buzz fizz 7 8 fizz buzz 11 fizz 13 14 fizzbuzz 16 17 fizz 19 buzz'"
        );
    }
}