<!DOCTYPE html>
<html>
<head>
<title>BMI Calculator</title>
<style>
body {
    font-family: sans-serif;
    background: linear-gradient(135deg,#239691,#249922);
    color: white;
    justify-content:center;
    height: 100px;
    display:flex;
    align-items:center;
}
.container {
    width: 300px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow:0px 0px 10px rgba(1,1,1,1.2);
    background-color: gray;
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
    background-color:rgb(69, 199, 138);
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
<div class="container">
    <h2>BMI Calculator</h2>
    <form method="post">
        <label for="weight">Weight (kg):</label>
        <input type="number" step="0.01" name="weight" id="weight" required>

        <label for="height">Height (m):</label>
        <input type="number" step="0.01" name="height" id="height" required>

        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $weight = $_POST["weight"];
        $height = $_POST["height"];
        if (!is_numeric($weight) || !is_numeric($height) || $weight <= 0 || $height <= 0) {
            echo "<div id='result'>Invalid input. Please enter positive numeric values.</div>";
        } else {
            $bmi = $weight / ($height * $height);
            $bmi = round($bmi, 2); 

            $classification = "";
            if ($bmi < 18.5) {
                $classification = "Underweight";
            } elseif ($bmi >= 18.5 && $bmi < 25) {
                $classification = "Normal weight";
            } elseif ($bmi >= 25 && $bmi < 30) {
                $classification = "Overweight";
            } else {
                $classification = "Obese";
            }

            echo "<div id='result'>Your BMI is: " . $bmi . "<br>Classification: " . $classification . "</div>";
        }
    }
    ?>
</div>
</body>
</html>