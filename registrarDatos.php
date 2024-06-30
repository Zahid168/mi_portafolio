<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdIntegrador";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT * FROM vale";
$result = $conn->query($sql);

$eventos = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $eventos[] = $row;
    }
    echo json_encode($eventos);
} else {
    echo "0 results";
}

$conn->close();
?>
