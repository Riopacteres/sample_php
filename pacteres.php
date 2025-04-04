<?php
 // Price list
 $prices = [
     "Sisig" => 25.00,
     "Crispy Pata" => 20.25,
     "Lechon Manok" => 200.75,
     " Barbecue" => 15.50,
     "Chicharon" => 30.50,
 ];
 
 // Function to get item price (with error handling)
 function getItemPrice($item, $prices) {
     return isset($prices[$item]) ? $prices[$item] : "Invalid item";
 }
 
 // Function to calculate tax (12% for takeout)
 function calculateTax($amount, $takeout) {
     return $takeout ? $amount * 0.12 : 0;
 }
 
 // Function to calculate total
 function calculateTotal($item, $quantity, $takeout, $prices) {
     $price = getItemPrice($item, $prices);
     if (is_numeric($price)) {
         $subtotal = $price * $quantity;
         $tax = calculateTax($subtotal, $takeout);
         return $subtotal + $tax;
     } else {
         return $price; // Return error message if item is invalid
     }
 }
 
 // Process the form if submitted
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $item = $_POST["item"];
     $quantity = (int)$_POST["quantity"]; // Cast to integer
     $takeout = isset($_POST["takeout"]) && $_POST["takeout"] == "true";
 
     $total = calculateTotal($item, $quantity, $takeout, $prices);
 }
 ?>
 
 <!DOCTYPE html>
 <html>
 <head>
     <title>Order Calculator</title>
     <style>
         /* Basic styling */
         body { font-family: sans-serif; }
         label { display: block; margin-bottom: 5px; }
         input, select { width: 100%; padding: 8px; margin-bottom: 10px; }
         button { background-color: #4CAF50; color: white; padding: 10px; border: none; cursor: pointer; }
         #result { margin-top: 20px; font-weight: bold; }
         .container {
      width: 300px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      box-shadow:0px 0px 10px rgba(1,1,1,1.2);
      background-color: gray;
  }
  .container {
      width: 300px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      box-shadow:0 0 20pxrgb(black);
  }
  label {
      display: block;
      margin-bottom: 5px;
  }
  input[type="number"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      box-sizing: border-box;
      color:blue;
  } 
  input[type="submit"] {
      background-color: #4CAF50;
      color: blue;
      padding: 10px 15px;
      border: none;
      cursor: pointer;
  }
  #result {
      margin-top: 20px;
      padding: 10px;
      border: 1px solid #ccc;
      color:blue;
  }
     </style>
 </head>
 <body>
     <div class ="container">
     <h1>Order Calculator</h1>
     <form method="post">
     <label for="item">Item:</label>
         <select id="item" name="item">
             <option value="Sisig">Sisig</option>
             <option value="Crispy Pata">Crispy Pata</option>
             <option value="Lechon Manok">Lechon Manok</option>
             <option value=" Barbecue"> Barbecue</option>
             <option value="Chicharon">Chicharon</option>
         </select>
 
         <label for="quantity">Quantity:</label>
         <input type="number" id="quantity" name="quantity" value="1">
 
         <label>Dine In/Take Out:</label>
         <input type="radio" id="dinein" name="takeout" value="false" checked>
         <label for="dinein">Dine In</label>
         <input type="radio" id="takeout" name="takeout" value="true">
         <label for="takeout">Take Out</label>
 
         <button type="submit">Calculate</button>
     </form>
     <div id="result">
         <?php if (isset($total)): ?>
             Total: $<?php echo number_format($total, 2); ?>
         <?php endif; ?>
     </div>
 </body>
 </html>