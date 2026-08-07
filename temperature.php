<?php

$result = null;
$error = null;

function to_kelvin(float $value, string $unit): float {
    switch ($unit) {
        case "celsius":
            return $value + 273.15;
        case "fahrenheit":
            return ($value - 32) * 5/9 + 273.15;
        case "kelvin":
            return $value;
        default:
            throw new InvalidArgumentException("Invalid temperature unit: $unit");
    }
}

function from_kelvin(float $kelvin, string $unit): float {
    switch ($unit) {
        case "celsius":
            return $kelvin - 273.15;
        case "fahrenheit":
            return ($kelvin - 273.15) * 9/5 + 32;
        case "kelvin":
            return $kelvin;
        default:
            throw new InvalidArgumentException("Invalid temperature unit: $unit");
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $value = floatval($_POST["value"]);
    $from_unit = $_POST["from-unit"];
    $to_unit = $_POST["to-unit"];

    $kelvin = to_kelvin($value, $from_unit);

    if ($kelvin < 0) {
        $error = "Temperature cannot be below absolute zero.";
    } else {
        $result = round(from_kelvin($kelvin, $to_unit), 2);
    }
}

?>

<?php include 'header.php'; ?>

    <form method="post">
        <p>Enter the temperature to convert</p>
        <input type="text" name="value" placeholder="Temperature" autofocus autocomplete="off">
        <div id="units">
            <label for="from-unit">From</label>
            <select name="from-unit" id="from-unit">
                <option value="celsius">Celsius</option>
                <option value="fahrenheit">Fahrenheit</option>
                <option value="kelvin" selected>Kelvin</option>
            </select>
            <label for="to-unit">To</label>
            <select name="to-unit" id="to-unit">
                <option value="celsius">Celsius</option>
                <option value="fahrenheit" selected>Fahrenheit</option>
                <option value="kelvin">Kelvin</option>
            </select>
        </div>
        <button type="submit">Convert</button>
    </form>

    <?php if ($error !== null): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php elseif ($result !== null): ?>
        <p><?= $value ?> <?= $from_unit ?> is equal to <?= $result ?> <?= $to_unit ?></p>
    <?php endif; ?>

<?php include 'footer.php'; ?>