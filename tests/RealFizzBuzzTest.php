<?php
namespace RealFizzBuzz\Test;
require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use RealFizzBuzz\RealFizzBuzz as RealFizzBuzz;

class RealFizzBuzzTest extends TestCase {
    public function testStep1(){
        $input = range(1, 20);
        $output = RealFizzBuzz::step1($input);
        $this->assertEquals(
            '1 2 lucky 4 buzz fizz 7 8 fizz buzz 11 fizz lucky 14 fizzbuzz 16 17 fizz 19 buzz',
            $output,
            "The output should match: '1 2 lucky 4 buzz fizz 7 8 fizz buzz 11 fizz lucky 14 fizzbuzz 16 17 fizz 19 buzz'"
        );
    }

    public function testReport(){
        RealFizzBuzz::$report = array(
            'fizz' => 0,
            'buzz' => 0,
            'fizzbuzz' => 0,
            'lucky' => 0,
            'integer' => 0 
        );
        RealFizzBuzz::step1(range(1,20));
        $output = RealFizzBuzz::generateReport();
        $this->assertEquals(
            "fizz: 4\nbuzz: 3\nfizzbuzz: 1\nlucky: 2\ninteger: 10",
            $output,
            "The output should match: fizz: 4 buzz: 3 fizzbuzz: 1 lucky: 2 integer: 10"
        );
    }
}