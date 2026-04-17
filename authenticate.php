<?php
// Configuración de la base de datos (cámbiala según tu entorno local)
$servername = "localhost";
$username_db = "root";      // usuario de MySQL
$password_db = "";          // contraseña de MySQL (en XAMPP por defecto es vacía)
$dbname = "testdb";

// Crear conexión
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario (sin sanitizar ¡Peligro!)
$user = $_POST['username'];
$pass = $_POST['password'];

// Consulta vulnerable: concatenación directa de variables
$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
echo "<p><strong>Consulta ejecutada:</strong> " . htmlspecialchars($sql) . "</p>";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuario autenticado
    echo "<h2>✅ Acceso concedido</h2>";
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " - Usuario: " . $row['username'] . "<br>";
    }
} else {
    echo "<h2>❌ Acceso denegado. Credenciales incorrectas.</h2>";
}

$conn->close();
?>
