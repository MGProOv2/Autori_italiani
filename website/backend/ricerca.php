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

<!DOCTYPE HTML>
<html>
	<head>
		<title>Risultati ricerca - WikiAutori</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a href="../index.html" class="title">WikiAutori</a>
				<nav>
					<ul>
						<li><a href="../index.html" class="active">Home</a></li>
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h1 class="major">Risultati Ricerca</h1>

				<!-- Form di ricerca -->
					<form method="GET" action="ricerca.php" style="display: flex; gap: 1em; align-items: center;">
                        <input type="text" name="cerca" id="cerca" placeholder="Inserisci nome autore o titolo opera" value="<?php echo htmlspecialchars($termine); ?>" required style="flex: 1;" />
                        <button type="submit" class="button scrolly">Cerca</button>
                    </form>


				<!-- Risultati -->
				<?php if ($termine === ""): ?>
					<p class="text-center">Inserisci un termine di ricerca.</p>
				<?php elseif (empty($risultati)): ?>
					<p class="text-center">Nessun risultato trovato per "<strong><?php echo htmlspecialchars($termine); ?></strong>".</p>
				<?php else: ?>
					<div class="row">
                        <?php foreach ($risultati as $risultato): ?>
                            <div class="col-12">
                                <div class="box">
                                    <h3><?php echo htmlspecialchars($risultato['nome'] . ' ' . $risultato['cognome']); ?></h3>
                                    <p>
                                        <strong>Luogo di nascita:</strong> <?php echo htmlspecialchars($risultato['luogo_nascita'] ?? 'N/A'); ?><br>
                                        <strong>Data di nascita:</strong> <?php echo htmlspecialchars($risultato['data_nascita'] ?? 'N/A'); ?><br>
                                        <strong>Biografia:</strong> <?php echo htmlspecialchars($risultato['biografia'] ?? 'Nessuna biografia disponibile.'); ?>
                                    </p>
                                    <a href="../autori/<?php echo htmlspecialchars(strtolower(str_replace("'", "", $risultato['cognome']))); ?>.html" class="button small" style="font-size: 10px !important;">
                                        Vai alla pagina dell'autore
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
				<?php endif; ?>

				<ul class="actions">
                    <li>
                        <a href="../index.html" class="button scrolly">
                            Torna alla home
                        </a>
                    </li>
				</ul>

			</div>

		<!-- Footer -->
			<footer id="footer" class="wrapper alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; WikiAutori. Tutti i diritti sono riservati. | Source Code: <a href="https://github.com/MGProOv2/Autori-italiani/tree/main" target="_blank">GitHub</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

<?php
// Chiudi la connessione
$conn = null;
?>