<?php
$error = "";

//what user type in each box will given here
$block1 ="";
$block2 ="";
$block3 ="";
$block4 ="";
$block5 ="";

 if (isset($_POST['calculate'])){

//get data from the form user enter
 $block1 = $_POST['block1'];
 $block2 = $_POST['block2'];
 $block3 = $_POST['block3'];
 $block4 = $_POST['block4'];
 $block5 = $_POST['block5'];

 //an empty box means that block was not used, so make it 0
 if($block1 ==""){
    $block1 = 0;
 }
 if($block2 ==""){
    $block2 = 0;
 }
 if($block3 ==""){
    $block3 = 0;
 }
 if($block4 ==""){
    $block4 = 0;
 }
 if($block5 ==""){
    $block5 = 0;
 }

 //validation
 //make sure it is a numeric number
if(!is_numeric($block1) ||
    !is_numeric($block2) ||
    !is_numeric($block3) ||
    !is_numeric($block4) ||
    !is_numeric($block5)
    ){
    $error = "Please enter numbers only.";
    }

    //meter reading cannot be less than zero
    else if ($block1 < 0 || $block2 < 0 || $block3 < 0 || $block4 < 0 || $block5 < 0){
        $error = "kWh cannot be negative number.";
    }
        else if ($block1 > 200 || $block2 > 100 || $block3 > 300 || $block4 > 300){
        $error = "kWh cannot exceed the limit.";
    }
 
    else {
 //charge for each block
 $charge1 = $block1 * 0.218;
 $charge2 = $block2 * 0.344;
 $charge3 = $block3 * 0.516;
 $charge4 = $block4 * 0.546;
 $charge5 = $block5 * 0.571;

 //total kWh of data
 $totalKwh = $block1 + $block2 + $block3 + $block4 + $block5;
 $totalCharge = $charge1 + $charge2 + $charge3 + $charge4 + $charge5;

 //minimum charge
 if($totalCharge < 3.00){
    $totalCharge = 3.00;
 }

 //charge sst
 if($totalKwh > 600){
    $sst = $totalCharge * 0.06;
} else {
    $sst = 0;
}

//final bill
$totalBill = $totalCharge + $sst;
 }

 }

?>