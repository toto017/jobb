<?php
$Result = "";
$InputUnit = "";
$OutputUnit = "";
$Convert = 0;

if (isset($_POST['Submit'])) {
    $InputUnit = $_POST["InputUnit"];
    $InputValue = floatval($_POST["InputValue"]);
    $OutputUnit = $_POST["OutputUnit"];

    if ($InputUnit == "cm") {
        $Convert = $InputValue / 100;
        $ShowInputUnit = "Centimeter";
    } elseif ($InputUnit == "m") {
        $Convert = $InputValue;
        $ShowInputUnit = "Meter";
    } elseif ($InputUnit == "km") {
        $Convert = $InputValue * 1000;
        $ShowInputUnit = "Kilometer";
    }

    $Centimeter = $Convert * 100;
    $Meter = $Convert;
    $Kilometer = $Convert / 1000;
    $Feet = $Meter * 3.28084;
    $Inches = $Feet * 12;
    $Yards = $Feet / 3;
    $Miles = $Yards / 1760;

    if ($OutputUnit == "cm") {
        $Result = $Centimeter;
        $ShowOutputUnit = "Centimeter";
    } elseif ($OutputUnit == "m") {
        $Result = $Meter;
        $ShowOutputUnit = "Meter";
    } elseif ($OutputUnit == "km") {
        $Result = $Kilometer;
        $ShowOutputUnit = "Kilometer";
    } elseif ($OutputUnit == "in") {
        $Result = $Inches;
        $ShowOutputUnit = "Inches";
    } elseif ($OutputUnit == "ft") {
        $Result = $Feet;
        $ShowOutputUnit = "Feet";
    } elseif ($OutputUnit == "yd") {
        $Result = $Yards;
        $ShowOutputUnit = "Yards";
    } elseif ($OutputUnit == "mi") {
        $Result = $Miles;
        $ShowOutputUnit = "Miles";
    }

    $Show = "$InputValue $ShowInputUnit = $Result $ShowOutputUnit";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="style.css">
<title>หน่วยวัดระบบเมทริก</title>
</head>
<body>
<div class="container text-center">
<div class="row">
<div class="col-2 "></div>
        <div class="col-8 ">

            <?php require('nav.php') ?>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 border rounded mt-4 p-2 ">
               
                <form method="post">
                    <div class="form-group">
                        <label for="InputUnit"><h4>แปลงหน่วย</h4></label>
                        <select class="form-control" id="InputUnit" name="InputUnit">
                            <option>หน่วยวัดระบบเมทริก</option>
                            <option value="cm" <?php if ($InputUnit == "cm") {echo 'selected';} ?>>เซนติเมตร : Centimeter (cm)</option>
                            <option value="m"  <?php if ($InputUnit == "m")  {echo 'selected';} ?>>เมตร : Meter (m)</option>
                            <option value="km" <?php if ($InputUnit == "km") {echo 'selected';} ?>>กิโลเมตร : Kilometer (km)</option>
                            
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputValue"><h4>ป้อนค่าที่ต้องการ</h4></label>
                        <input type="number" step="0.0001" class="form-control" id="InputValue" name="InputValue" 
                        value="<?php echo $InputValue; ?>">
                    </div>
                    <div class="form-group">
                        <label for="OutputUnit"><h4>เป็นหน่วย</h4></label>
                        <select class="form-control" id="OutputUnit" name="OutputUnit">
                        
                            <option value="cm" <?php if ($OutputUnit == "cm") {echo 'selected';} ?>>เซนติเมตร : Centimeter (cm)</option>
                            <option value="m"  <?php if ($OutputUnit == "m")  {echo 'selected';} ?>>เมตร : Meter (m)</option>
                            <option value="km" <?php if ($OutputUnit == "km") {echo 'selected';} ?>>กิโลเมตร : Kilometer (km)</option>
                           
                            <option value="in" <?php if ($OutputUnit == "in") {echo 'selected';} ?>>นิ้ว : Inches (in)</option>
                            <option value="ft" <?php if ($OutputUnit == "ft") {echo 'selected';} ?>>ฟุต : Feet (ft)</option>
                            <option value="yd" <?php if ($OutputUnit == "yd") {echo 'selected';} ?>>หลา : Yards (yd)</option>
                            <option value="mi" <?php if ($OutputUnit == "mi") {echo 'selected';} ?>>ไมล์ : Miles (mi)</option>
                        </select>
                    </div><br>
                    <button type="submit" id="submit" name="Submit" class="btn btn-secondary">แปลงค่า</button>
                   
                </form>
                <?php 
                if (isset($_POST['Submit'])) {
                    echo "<h3>$Show</h3>";
                }
            ?>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>