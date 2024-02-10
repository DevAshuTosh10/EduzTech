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

$sql = "SELECT * FROM queries";
$result = $conn->query($sql);

// HTML for displaying user queries
echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>User Queries</title>';
echo '</head>';
echo '<body>';
echo '<h2>User Queries</h2>';
echo '<table border="1">';
echo '<tr>';
echo '<th>Name</th>';

echo '<th>Query Text</th>';
echo '</tr>';
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $row['name'] . '</td>';
   
    echo '<td>' . $row['UserQuery'] . '</td>';
    echo '</tr>';
}
echo '</table>';
echo '</body>';
echo '</html>';

// Close the database connection
$conn->close();
?>
