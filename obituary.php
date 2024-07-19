<!-- entry_form.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Obituary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .form-container {
            color: white;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }
        .form-container input,.form-container textarea,.form-container select {
            background-color: silver;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: green;
            color: white;
            font-size: 16px;
        }
        /* Add background video styles */
        .bg-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            object-fit: cover;
            z-index: -1;
        }
        /* Add social links styles */
        .social-links {
            margin-top: 20px;
            text-align: center;
        }
        .social-links a {
            margin: 0 10px;
            color: blue;
            text-decoration: none;
        }
        .social-links a:hover {
            color: red;
        }
    </style>
</head>
<body>
    <video class="bg-video" autoplay loop muted>
        <source src="review.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <h1>Add Obituary</h1>
    <form action="obituary.php" method="post" onsubmit="return validateForm()">
        <label>Name:</label><br>
        <input type="text" name="name" required><br>
        
        <label>Date of Birth:</label><br>
        <input type="date" name="D_O_B" required><br>
        
        <label>Date of Death:</label><br>
        <input type="date" name="D_O_D" required><br>

        <label>Content:</label><br>
        <textarea name="content" rows="5" required></textarea><br>

        <label>Author:</label><br>
        <input type="text" name="author" required><br>
        
        <input type="submit" name="submit" value="Submit">
    </form>
    
    <script>
        function validateForm() {
            const rating = document.getElementById("author").value;
            if (rating === "") {
                alert("Please select a author.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "obituary_platform";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $D_O_B = $_POST['D_O_B'];
    $D_O_D = $_POST['D_O_D'];
    $author = $_POST['author'];
    $content = $_POST['content'];

    $sql = "INSERT INTO obituary (name, D_O_B, D_O_D, author, content) VALUES ('$name', '$D_O_B', '$D_O_D', '$author', '$content')";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

} else {
    echo "Invalid request method.";
}
?>

