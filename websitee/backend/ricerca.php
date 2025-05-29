<?php
// Parametri di connessione al database
$host = "";
$username = "";
$password = "";
$dbname = "";

try {
    // Crea la connessione PDO usando il driver del DBMS
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Connessione fallita: " . $e->getMessage());
}

// Ricevi il termine di ricerca
$termine = isset($_GET['cerca']) ? trim($_GET['cerca']) : "";

$risultati = [];
if ($termine != "") {
    $sql = "SELECT a.id, a.nome, a.cognome, a.luogo_nascita, a.data_nascita, a.biografia
            FROM autori a
            WHERE a.nome LIKE :cerca OR a.cognome LIKE :cerca
            UNION /* OR */
            SELECT a.id, a.nome, a.cognome, a.luogo_nascita, a.data_nascita, a.biografia
            FROM autori a
            JOIN opere o ON a.id = o.autore_id
            WHERE o.titolo LIKE :cerca";
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
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>Risultati Ricerca - WikiAutori</title>
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Risultati della Ricerca</h1>
        
        <!-- Form di ricerca --
        <form method="GET" action="ricerca.php">
            <div class="fields">
                <div class="field">
                    <input type="text" name="cerca" id="cerca" placeholder="Inserisci nome autore o titolo opera" value="<?php echo htmlspecialchars($termine); ?>" required>
                </div>
            </div>
            <ul class="actions">
                <li><button type="submit" class="button scrolly">Cerca</button><br></li>
            </ul>
        </form> -->

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
                                    <strong>Data di nascita:</strong> <?php echo htmlspecialchars($risultato['data_nascita'] ?? 'N/A'); ?><br>
                                    <strong>Biografia:</strong> <?php echo htmlspecialchars($risultato['biografia'] ?? 'Nessuna biografia disponibile.'); ?><br>
                                    <!-- Pulsante per andare alla pagina dell'autore -->
                                    <a href="../autori/<?php echo htmlspecialchars(strtolower(str_replace("'", "", $risultato['cognome']))); ?>.html" class="btn btn-info mt-2">
                                        Vai alla pagina dell'autore
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <a href="../index.html" class="btn btn-secondary mt-3">Torna alla Home</a>
    </div>
</body>
</html>

<?php
// Chiudi la connessione
$conn = null;
?>