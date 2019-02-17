<?php
// create short variable names
$tireqty = $_POST['tireqty'];
$oilqty = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
$notes = $_POST['notes'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Order Results</h2>
<?php

echo "<p>Order processed at ";
echo date('H:i, jS F Y');
echo "</p>";

echo '<p>Your order is as follows: </p>';
echo htmlspecialchars($tireqty).' tires<br />';
echo htmlspecialchars($oilqty).' bottles of oil<br />';
echo htmlspecialchars($sparkqty).' spark plugs<br />';
echo "Customer notes: ".htmlspecialchars($notes).'<br />';
echo "How did you find Bob's: ";
$find = htmlspecialchars($_POST['find']);
switch ($find) {
    case "a":
        echo "regular customer";
        break;
    case "b":
        echo "TV advert";
        break;
    case "c":
        echo "phone directory";
        break;
    case "d":
        echo "word of mouth";
        break;
    default:
        echo 'source unknown';
        break;
}
echo '<br/>';

//3 part 3
echo '<br/>';
echo '<p>The type of each form field is:</p>';
echo 'tireqty: ' . gettype($tireqty) . '<br />';
echo 'oilqty: ' . gettype($oilqty) . '<br />';
echo 'sparkqty: ' . gettype($sparkqty) . '<br />';
echo 'notes: ' . gettype($notes) . '<br />';

//4 cast quantities to integers
$tireqty = (int)$tireqty;
$oilqty = (int)$oilqty;
$sparkqty = (int)$sparkqty;

echo '<br/>';
echo '<p>The type of each variable after converting tireqty, oilqty, and sparkqty to an int:</p>';
echo 'tireqty: ' . gettype($tireqty) . '<br />';
echo 'oilqty: ' . gettype($oilqty) . '<br />';
echo 'sparkqty: ' . gettype($sparkqty) . '<br />';
echo 'notes: ' . gettype($notes) . '<br />';

echo '<br />';

$totalqty = 0;
$totalqty = $tireqty + $oilqty + $sparkqty;

if ($tireqty < 0) {
    echo "Error: tire quantity cannot be less than zero.";
} elseif ($oilqty < 0) {
    echo "Error: oil quantity cannot be less than zero.";
} elseif ($sparkqty <0) {
    echo "Error: spark quantity cannot be less than zero.";
} elseif ($totalqty <=0) {
    echo "Error: no items were entered in your order.";
}else{
    echo "<p>Items ordered: " . $totalqty . "<br />";
    $totalamount = 0.00;

    define('TIREPRICE', 100);
    define('OILPRICE', 10);
    define('SPARKPRICE', 4);

    $totalamount = $tireqty * TIREPRICE
        + $oilqty * OILPRICE
        + $sparkqty * SPARKPRICE;

    echo "Subtotal: $" . number_format($totalamount, 2) . "<br />";

    $taxrate = 0.10;  // local sales tax is 10%
    $totalamount = $totalamount * (1 + $taxrate);
    echo "Total including tax: $" . number_format($totalamount, 2) . "</p>";
}


?>
</body>
</html>
