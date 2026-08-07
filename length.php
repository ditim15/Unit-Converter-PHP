<?php

$result = null;

$to_meters = [
    "millimeters" => 0.001,
    "centimeters" => 0.01,
    "meters" => 1,
    "kilometers" => 1000,
    "inches" => 0.0254,
    "feet" => 0.3048,
    "yards" => 0.9144,
    "miles" => 1609.34
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $value = floatval($_POST["value"]);
    $from_unit = $_POST["from-unit"];
    $to_unit = $_POST["to-unit"];
    $meters = $value * $to_meters[$from_unit];
    $result = round($meters / $to_meters[$to_unit], 4);
}

?>

<?php include 'header.php'; ?>

    <form method="post">
        <p>Enter the length to convert</p>
        <input type="text" name="value" placeholder="Length" autofocus autocomplete="off">
        <div id="units">
            <label for="from-unit">From</label>
            <select name="from-unit" id="from-unit">
                <option value="millimeters">Millimeters</option>
                <option value="centimeters">Centimeters</option>
                <option value="meters" selected>Meters</option>
                <option value="kilometers">Kilometers</option>
                <option value="inches">Inchs</option>
                <option value="feet">Feet</option>
                <option value="yards">Yards</option>
                <option value="miles">Miles</option>
            </select>
            <label for="to-unit">To</label>
            <select name="to-unit" id="to-unit">
                <option value="millimeters">Millimeters</option>
                <option value="centimeters">Centimeters</option>
                <option value="meters">Meters</option>
                <option value="kilometers">Kilometers</option>
                <option value="inches">Inchs</option>
                <option value="feet" selected>Feet</option>
                <option value="yards">Yards</option>
                <option value="miles">Miles</option>
            </select>
        </div>
        <button type="submit">Convert</button>
    </form>

    <?php if ($result !== null): ?>
        <p><?= $value ?> <?= $from_unit ?> is equal to <?= $result ?> <?= $to_unit ?></p>
    <?php endif; ?>
<?php include 'footer.php'; ?>