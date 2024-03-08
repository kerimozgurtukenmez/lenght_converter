<?php
if(isset($_POST['send'])){
    $value = !empty($_POST['value']) ? $_POST['value'] : 0;
    $convert = isset($_POST['convert']) ? $_POST['convert'] : null;
    $convert1 = isset($_POST['convert1']) ? $_POST['convert1'] : null;

    $result = convertUnit($value, $convert, $convert1);
    echo $result;
}
function convertUnit($value, $inputUnit, $outputUnit) {
    if ($value == 0) {
        return 0;
    }
    $unitFactors = array(
        'Mm' => 1,
        'Cm' => 10,
        'M'  => 1000,
        'Km' => 1000000,
    );


    if (!array_key_exists($inputUnit, $unitFactors) || !array_key_exists($outputUnit, $unitFactors)) {
        return "Faulty unit";
    }


    $inMillimeters = $value * $unitFactors[$inputUnit];


    $result = $inMillimeters / $unitFactors[$inputUnit];

    return $result;
}




?>

<html>
<head>
    <meta charset="UTF-8">

    <title>converter</title>
</head>
<body>
<form name="form" method="post" action="">

    <p>
        <label for="value">value: </label>
        <input type="number" name="value" >
    </p>
    <p>
        <label for="convert">which type your lenght</label><br>
        <input type="radio" name="convert" value="Mm">Mm<br>
        <input type="radio" name="convert" value="Cm">Cm<br>
        <input type="radio" name="convert" value="Km">Km<br>
    </p>
    <p>
        <label for="convert1">what to convert?</label><br>
        <input type="radio" name="convert1" value="Mm">Mm<br>
        <input type="radio" name="convert1" value="Cm">Cm<br>
        <input type="radio" name="convert1" value="Km">Km<br>
    </p>
    <p>
        <input type="submit" name="send" value="send">
    </p>




</form>
</body>
</html>
