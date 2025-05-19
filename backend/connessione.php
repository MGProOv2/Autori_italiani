<?php
$host = "sql.atonbox.it";       // Host del database (localhost)
$user = "atonboxi47213";            // Utente predefinito per XAMPP/MAMP
$password = "aton77728";            // Password vuota (modifica se necessario)
$dbname = "atonboxi47213"; // Nome del database

// Crea la connessione
$conn = new mysqli($host, $user, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
} else {
    echo "Connessione al database riuscita!";
}

// Chiude la connessione
$conn->close();
?>