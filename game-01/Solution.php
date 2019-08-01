<?php

namespace App;

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("log_errors", 0);
$rustart = getrusage();

class Solution
{
    const FIRST_SUBSET_SUM = 2;

    /**
     * TODO: I can improve this...
     *
     * @param int $length
     * @param int $step
     * @return array
     */
    public function numberGenerator(int $length = 100, int $step = 1): array
    {
        $start = 0;
        $base = range($start, $length, $step);
        shuffle($base);

        return $base;
    }

    /**
     * @param int $sum
     * @param array|int $numbers
     */
    public function init(int $sum, array $numbers = [])
    {
        $numbers = $numbers ?: $this->numberGenerator(
            rand(5, 10000),
            rand(1, 2)
        );

        $arrayString = $this->printArray($numbers);
        $countNumbers = count($numbers);

        echo "N Integer: {$sum}" . PHP_EOL;
        echo "M Count: {$countNumbers}" . PHP_EOL;
        echo "M Array: [{$arrayString}]" . PHP_EOL;

        $this->solveThis($sum, $numbers);
    }

    /**
     * @param int $sum
     * @param array $numbers
     */
    private function solveThis(int $sum, array $numbers = [])
    {
        $numbersFiltered = $this->filterUnderSumValue($numbers, $sum);
        $firstNumber = 0;
        $secondNumber = 0;

        for ($i = 0; $i < count($numbersFiltered); $i++) {
            $firstNumber = $numbersFiltered[$i];
            unset($numbersFiltered[$i]);
            $diff = $sum - $firstNumber;
            if (in_array($diff, $numbersFiltered)) {
                $secondNumber = $diff;
                break;
            }
        }

        if ($firstNumber && $secondNumber) {
            echo "\e[0;32mResult: {$firstNumber}, {$secondNumber}\e[0m\n";
        } else {
            echo "\e[0;31mResult: Empty\e[0m\n";
        }

        $this->printMemoryUsage();
    }

    /**
     * @param array $numbers
     * @param int $sum
     * @return array
     */
    private function filterUnderSumValue(array $numbers, int $sum): array
    {
        return array_values(array_filter($numbers, function ($number) use ($sum) {
            return $number < $sum;
        }));
    }

    /**
     * @param array $numbers
     * @return string
     */
    private function printArray(array $numbers): string
    {
        $minimum = 20;

        if (count($numbers) > $minimum) {
            return join(", ", array_slice($numbers, 0, $minimum)) . "...";
        }

        return join(", ", $numbers);
    }

    private function printMemoryUsage()
    {
        /* Currently used memory */
        $memory_usage = memory_get_usage();

        /* Peak memory usage */
        $memory_peak = memory_get_peak_usage();

        echo "Memory usage: " . round($memory_usage / 1024) . " KB" . PHP_EOL;
        echo "Memory peak usage: " . round($memory_peak / 1024) . " KB" . PHP_EOL;
    }
}

$solution = new Solution();
// $N = 40;
$N = 10;
$M = [5, 2, 8, 14, 0];
/*
 * Uncomment this line if you want use a preset array or yours.
 * By default you can use a random generator array
 *
 * You can change $N value too
 */
// $solution->init($N);
$solution->init($N, $M); // You can change $N value too

// Script end
function runtime($ru, $rus, $index)
{
    return ($ru["ru_$index.tv_sec"] * 1000 + intval($ru["ru_$index.tv_usec"] / 1000))
        -  ($rus["ru_$index.tv_sec"] * 1000 + intval($rus["ru_$index.tv_usec"] / 1000));
}

$ru = getrusage();
echo "Used " . runtime($ru, $rustart, "utime") . " ms for its computations\n";
echo "Spent " . runtime($ru, $rustart, "stime") . " ms in system calls\n";
