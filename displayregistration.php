<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Individuals</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }
    </style>
</head>
<body>
    <h2>Registered Individuals</h2>
<?php
// Include the database connection file
$servername="localhost";
$username="root";
$password="";
$dbname="register";
$conn= new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

// SQL query to retrieve registered users
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

// HTML for displaying registered users
echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>Registered Users</title>';
echo '</head>';
echo '<body>';

echo '<table border="1">';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Name</th>';
echo '<th>Email</th>';
echo '<th>Course Code</th>';
echo '</tr>';
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['subjectcode'] . '</td>';
    echo '</tr>';
}
echo '</table>';
echo '</body>';
echo '</html>';

// Close the database connection
$conn->close();
?>
