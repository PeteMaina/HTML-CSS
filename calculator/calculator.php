<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multipurpose Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        .container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        label, select, input, button {
            padding: 10px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Multipurpose Calculator</h1>
    <form method="post" class="container">
        <label for="num1">Number 1:</label>
        <input type="number" step="any" id="num1" name="num1" required>

        <label for="num2">Number 2 (optional for some operations):</label>
        <input type="number" step="any" id="num2" name="num2">

        <label for="operation">Operation:</label>
        <select id="operation" name="operation" required>
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
            <option value="exponentiate">Exponentiation</option>
            <option value="percentage">Percentage</option>
            <option value="sqrt">Square Root</option>
            <option value="logarithm">Logarithm</option>
        </select>

        <button type="submit">Calculate</button>
    </form>

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

        echo "<h2>Result: " . htmlspecialchars($result) . "</h2>";
    }
    ?>
</body>
</html>
