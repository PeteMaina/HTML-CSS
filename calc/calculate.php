<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = isset($_POST['num1']) ? floatval($_POST['num1']) : 0;
    $num2 = isset($_POST['num2']) ? floatval($_POST['num2']) : 0;
    $operation = $_POST['operation'];
    $result = "";

    function add($a, $b) {
        return $a + $b;
    }

    function subtract($a, $b) {
        return $a - $b;
    }

    function multiply($a, $b) {
        return $a * $b;
    }

    function divide($a, $b) {
        if ($b == 0) {
            return "Error: Division by zero";
        }
        return $a / $b;
    }

    function exponentiate($a, $b) {
        return pow($a, $b);
    }

    function percentage($a, $b) {
        return ($a / 100) * $b;
    }

    function sqrt_custom($a) {
        if ($a < 0) {
            return "Error: Cannot calculate the square root of a negative number";
        }
        return sqrt($a);
    }

    function logarithm($a) {
        if ($a <= 0) {
            return "Error: Cannot calculate the logarithm of a non-positive number";
        }
        return log($a);
    }

    if ($operation == "add") {
        $result = add($num1, $num2);
    } elseif ($operation == "subtract") {
        $result = subtract($num1, $num2);
    } elseif ($operation == "multiply") {
        $result = multiply($num1, $num2);
    } elseif ($operation == "divide") {
        $result = divide($num1, $num2);
    } elseif ($operation == "exponentiate") {
        $result = exponentiate($num1, $num2);
    } elseif ($operation == "percentage") {
        $result = percentage($num1, $num2);
    } elseif ($operation == "sqrt") {
        $result = sqrt_custom($num1);
    } elseif ($operation == "logarithm") {
        $result = logarithm($num1);
    } else {
        $result = "Error: Invalid operation";
    }

    header("Location: index.html?result=" . urlencode($result));
    exit();
}
?>
