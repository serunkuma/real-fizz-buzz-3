<?php
namespace RealFizzBuzz;
require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

class RealFizzBuzz {
    public static $report = array(
        'fizz' => 0,
        'buzz' => 0,
        'fizzbuzz' => 0,
        'lucky' => 0,
        'integer' => 0 
    );

    public static function step1($range) {
        $output = '';
        $rangeSize = count($range);
        
        for($i = 0; $i < $rangeSize ; $i++ ) {
            $last = $i === $rangeSize - 1 ? '' : ' ';
            $isLucky = (bool) preg_match("/3/", strval($range[$i]));

            $isLucky ? self::$report['lucky']++ : null; // count lucky here and dont count it again
    
            switch ($range[$i]) {
                case $range[$i] % 15 === 0:
                    $output .= $isLucky ? 'lucky' . $last : 'fizzbuzz' . $last;
                    $isLucky ? null : self::$report['fizzbuzz']++;
                    break;
    
                case $range[$i] % 5 === 0:
                    $output .= $isLucky ? 'lucky' . $last : 'buzz' . $last;
                    $isLucky ? null : self::$report['buzz']++;
                    break;
    
                case $range[$i] % 3 === 0:
                    $output .= $isLucky ? 'lucky' . $last : 'fizz' . $last;
                    $isLucky ? null : self::$report['fizz']++;
                    break;
    
                default:
                    $output .= $isLucky ? 'lucky' . $last : $range[$i] . $last;
                    $isLucky ? null : self::$report['integer']++;
                    break;
            }
        }
        return $output;
    }


    public static function generateReport() {
        return 
        "fizz: " . self::$report['fizz'] . "\n" .
        "buzz: " . self::$report['buzz'] . "\n" .
        "fizzbuzz: " . self::$report['fizzbuzz'] . "\n" .
        "lucky: " . self::$report['lucky'] . "\n" .
        "integer: " . self::$report['integer'];
    }
}

$rangeStart = (int) empty($_GET['start']) ? null : $_GET['start'];
$rangeEnd = (int) empty($_GET['end']) ? null : $_GET['end'];

?>

<?php if($rangeStart && $rangeEnd):
    
    echo RealFizzBuzz::step1(range($rangeStart, $rangeEnd));
    echo '<pre>' . RealFizzBuzz::generateReport() . '</pre>';

else : ?>

    <h4>Please enter the range we are to use when populating the fizzbuzz string</h4>

    <form method="get">
        <p>Start : <input name="start" type="text"/> </p>
        <p> End : <input name="end" type="text"/> </p>
        <button type="submit">submit</button>
    </p>

<?php endif; ?>