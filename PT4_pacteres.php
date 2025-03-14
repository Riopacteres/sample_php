<!DOCTYPE html>
 <html>
 <head>
 <title>Sum of Squares and Cubes</title>
 </head>
 <style>
 body{
     font-family:sans-serif;
 padding: 30px;
 background: linear-gradient(135deg,#0adbec  ,#0deed6,#49f1df,#52d5f1 );
 }
 h2{color:#14ccc9;}
 .container {
   width: 300px;
   margin: 20px auto;
   padding: 20px;
   border: 3px solid #ccc;
 background-color:lightblue;}
 </style>
 <body>
     <center>
     <div class="container">
 <h1>Sum of Reciprocals</h1>
 <form method="POST" >
   Enter the number of N: <input type="number" name="n" required><br><br>
   <input type="submit" value="Calculate">
 </form>
 <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $n = $_POST["n"]; 
   if (is_numeric($n) && $n > 0) {
     $sum = 0;
     for ($i = 1; $i <= $n; $i++) {
       $sum += 1 / $i;
     }
     echo "<p>sum :   " . $sum . "</p>";
   } else {
     echo "<p>Please enter a valid positive integer for N.</p>";
   }
 }
 ?>
 </body>
 </html