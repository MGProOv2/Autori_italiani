<?php
// Parametri di connessione al database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "autori_italiani_db";

try {
    // Crea la connessione PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Connessione fallita: " . $e->getMessage());
}

// Ricevi il termine di ricerca
$termine = isset($_GET['cerca']) ? trim($_GET['cerca']) : "";

// Prepara la query con prepared statement
$risultati = [];
if ($termine != "") {
    $sql = "SELECT a.id, a.nome, a.cognome, a.luogo_nascita, o.titolo, o.anno_pubblicazione, o.genere, o.descrizione
            FROM autori a
            LEFT JOIN opere o ON a.id = o.autore_id
            WHERE a.nome LIKE :cerca OR a.cognome LIKE :cerca OR o.titolo LIKE :cerca";
    $stmt = $conn->prepare($sql);
    $cerca = "%$termine%";
    $stmt->execute(['cerca' => $cerca]);
    $risultati = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultati Ricerca - WikiAutori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Risultati della Ricerca</h1>
        
        <!-- Form di ricerca -->
        <form action="../backend/ricerca.php" method="GET" class="d-flex justify-content-center mb-4">
            <input type="text" name="cerca" placeholder="Inserisci nome autore o titolo opera" class="form-control w-50 me-2" value="<?php echo htmlspecialchars($termine); ?>" required>
            <button type="submit" class="btn btn-primary">Cerca</button>
        </form>

        <!-- Risultati -->
        <?php if ($termine === ""): ?>
            <p class="text-center">Inserisci un termine di ricerca.</p>
        <?php elseif (empty($risultati)): ?>
            <p class="text-center">Nessun risultato trovato per "<strong><?php echo htmlspecialchars($termine); ?></strong>".</p>
        <?php else: ?>
            <div class="row">
                <?php foreach ($risultati as $risultato): ?>
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo htmlspecialchars($risultato['nome'] . ' ' . $risultato['cognome']); ?>
                                </h5>
                                <p class="card-text">
                                    <strong>Luogo di nascita:</strong> <?php echo htmlspecialchars($risultato['luogo_nascita'] ?? 'N/A'); ?><br>
                                    <?php if ($risultato['titolo']): ?>
                                        <strong>Opera:</strong> <?php echo htmlspecialchars($risultato['titolo']); ?><br>
                                        <strong>Anno:</strong> <?php echo htmlspecialchars($risultato['anno_pubblicazione']); ?><br>
                                        <strong>Genere:</strong> <?php echo htmlspecialchars($risultato['genere'] ?? 'N/A'); ?><br>
                                        <strong>Descrizione:</strong> <?php echo htmlspecialchars($risultato['descrizione'] ?? 'Nessuna descrizione disponibile.'); ?><br>
                                        <!-- Pulsante per andare alla pagina dell'autore -->
                                        <a href="../WebSite/autori/<?php echo htmlspecialchars(strtolower(str_replace("'", "", $risultato['cognome']))); ?>.html" class="btn btn-info mt-2">
                                            Vai alla pagina dell'autore
                                        </a>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <a href="../WebSite/index.html" class="btn btn-secondary mt-3">Torna alla Home</a>
    </div>
</body>
</html>

<?php
// Chiudi la connessione
$conn = null;
?>