<?php
// Using a while loop
$sum = 0;
$i = 1;
$N = 8;
while ($i <= 8) {
  $sum += 1.0 / $i;
  $i++;
}

echo " Enter N: " . $N . "\n";
echo "<br>";

// Using a do-while loop
$sum = 0;
$i = 1;

do {
  $sum += 1.0 / $i;
  $i++;
} while ($i <= 8);

echo "Sum : " . $sum . "\n";
?>
  
