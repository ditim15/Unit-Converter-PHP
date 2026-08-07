<?php

$result = null;

$to_grams = [
    "milligrams" => 0.001,
    "grams" => 1,
    "kilograms" => 1000,
    "ounces" => 28.3495,
    "pounds" => 453.592
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $value = floatval($_POST['value']);
    $from_unit = $_POST['from-unit'];
    $to_unit = $_POST['to-unit'];
    $grams = $value * $to_grams[$from_unit];
    $result = round($grams / $to_grams[$to_unit], 4);
}

?>

<?php include 'header.php'; ?>

    <form method="post">
        <p>Enter the weight to convert</p>
        <input type="text" name="value" placeholder="Weight" autofocus autocomplete="off">
        <div id="units">
            <label for="from-unit">From</label>
            <select name="from-unit" id="from-unit">
                <option value="milligrams">Milligrams</option>
                <option value="grams" selected>Grams</option>
                <option value="kilograms">Kilograms</option>
                <option value="ounces">Ounces</option>
                <option value="pounds">Pounds</option>
            </select>
            <label for="to-unit">To</label>
            <select name="to-unit" id="to-unit">
                <option value="milligrams">Milligrams</option>
                <option value="grams">Grams</option>
                <option value="kilograms" selected>Kilograms</option>
                <option value="ounces">Ounces</option>
                <option value="pounds">Pounds</option>
            </select>
        </div>
        <button type="submit">Convert</button>
    </form>

    <?php if ($result !== null): ?>
        <p><?= $value ?> <?= $from_unit ?> is equal to <?= $result ?> <?= $to_unit ?></p>
    <?php endif; ?>