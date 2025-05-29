# Progetto Sito Autori Italiani e Stranieri - WikiAutori

## Introduzione
*WikiAutori* è un progetto scolastico realizzato da un gruppo di studenti di quinta superiore con l’obiettivo di creare un sito web informativo sugli autori letterari italiani e stranieri. Il sito permette agli utenti di cercare autori per nome o cognome, visualizzare biografie dettagliate, elenchi delle opere principali e approfondimenti su opere specifiche studiate nel programma scolastico, insieme a un’analisi del contesto letterario e dello stile di ciascun autore. Il progetto integra un database per gestire i dati, dimostrando le competenze acquisite in progettazione di database, sviluppo backend e frontend.

## Obiettivo Didattico
Il progetto ha lo scopo di dimostrare le seguenti competenze:
•⁠  ⁠Progettare e implementare un database relazionale MySQL.
•⁠  ⁠Sviluppare un backend in PHP per gestire le query al database e restituire i risultati.
•⁠  ⁠Creare un’interfaccia frontend user-friendly utilizzando HTML, CSS, JavaScript.
•⁠  ⁠Utilizzare strumenti di versionamento come Git e GitHub per la collaborazione e il controllo delle versioni.

## Struttura del Database
Il database è stato progettato per archiviare informazioni sugli autori e le loro opere. È composto da due tabelle relazionali:

•⁠  ⁠*autori*:
  - ⁠ id ⁠: Chiave primaria, auto-incrementante (es. 1, 2, 3...).
  - ⁠ nome ⁠: Nome dell’autore (es. "Giovanni", obbligatorio).
  - ⁠ cognome ⁠: Cognome dell’autore (es. "Verga", obbligatorio).
  - ⁠ data_nascita ⁠: Data di nascita (es. "1840-09-02").
  - ⁠ luogo_nascita ⁠: Luogo di nascita (es. "Catania").
  - ⁠ data_morte ⁠: Data di morte (es. "1922-01-27").
  - ⁠ corrente_letteraria ⁠: Corrente letteraria dell’autore (es. "Verismo").
  - ⁠ biografia ⁠: Breve descrizione della vita dell’autore (opzionale, testo lungo).

•⁠  ⁠*opere*:
  - ⁠ id ⁠: Chiave primaria, auto-incrementante.
  - ⁠ titolo ⁠: Titolo dell’opera (es. "I Malavoglia", obbligatorio).
  - ⁠ anno_pubblicazione ⁠: Anno di pubblicazione (es. 1881).
  - ⁠ genere ⁠: Genere dell’opera (es. "Romanzo").
  - ⁠ autore_id ⁠: Chiave esterna che collega l’opera al rispettivo autore (riferimento a ⁠ autori.id ⁠).
  - ⁠ descrizione ⁠: Breve descrizione dell’opera (opzionale).

### Schema Relazionale
•⁠  ⁠La relazione tra le tabelle è di tipo 1-N: un autore può avere più opere, ma ogni opera è associata a un solo autore (⁠ autore_id ⁠).

## Funzionalità
Il sito offre le seguenti funzionalità principali:
•⁠  ⁠*Ricerca di autori*: Gli utenti possono cercare autori per nome o cognome tramite un form nella homepage.
•⁠  ⁠*Visualizzazione dei dettagli*:
  - Per ogni autore, viene mostrata una biografia, un elenco delle opere principali e un approfondimento su opere specifiche studiate nel programma.
  - Una sezione analizza il contesto letterario (es. Verismo, Ermetismo) e lo stile dell’autore.
•⁠  ⁠*Navigazione intuitiva*: Pulsanti permettono di tornare alla pagina dei risultati o alla homepage.

### Autori Trattati
Il sito include i seguenti autori, selezionati in base al programma scolastico:
•⁠  ⁠*Giovanni Verga* (Verismo)
•⁠  ⁠*Alessandro Manzoni* (Romanticismo)
•⁠  ⁠*Charles Baudelaire* (Simbolismo)
•⁠  ⁠*Gabriele D’Annunzio* (Decadentismo)
•⁠  ⁠*Franz Kafka* (Modernismo)
•⁠  ⁠*Filippo Tommaso Marinetti* (Futurismo)
•⁠  ⁠*Giovanni Pascoli* (Decadentismo)
•⁠  ⁠*Luigi Pirandello*
•⁠  ⁠*Giuseppe Ungaretti* (Ermetismo)

## Tecnologie Utilizzate
•⁠  ⁠*Database*: MySQL per la gestione dei dati.
•⁠  ⁠*Backend*: PHP per la connessione al database e la gestione delle query.
•⁠  ⁠*Frontend*: HTML per la struttura, CSS e JavaScript per lo stile.
•⁠  ⁠*Versionamento*: Git e GitHub per il controllo delle versioni e la collaborazione tra i membri del team.


## Stato del Progetto
•⁠  ⁠*Database*: Completato e testato, con dati inseriti per tutti gli autori e le opere.
•⁠  ⁠*Backend*: Completato, con script PHP funzionanti per la ricerca e la visualizzazione dei dati (Per questioni di tempo il design è incompleto).
•⁠  ⁠*Frontend*: Completato, con una homepage e pagine dedicate per ogni autore (Mancanti alcuni elementi).
•⁠  ⁠*Documentazione*: Completata con il file ⁠ README.md ⁠ e questo ⁠ progetto.md ⁠.

### Risultati Raggiunti
•⁠  ⁠Il sito è completamente funzionante in un ambiente locale (XAMPP).
•⁠  ⁠Gli utenti possono cercare autori e accedere a informazioni dettagliate in modo intuitivo.
•⁠  ⁠Le pagine degli autori sono ben strutturate, con contenuti che rispettano il programma scolastico.

### Difficoltà Incontrate
•⁠  ⁠*Connessione al database*: Iniziali problemi di configurazione con PHP e MySQL, risolti verificando le credenziali e i permessi.
•⁠  ⁠*Collaborazione*: Alcuni conflitti durante il versionamento su GitHub, risolti con una migliore comunicazione nel team.

## Istruzioni per l’Esecuzione
1.⁠ ⁠*Installa XAMPP* e avvia Apache e MySQL.
2.⁠ ⁠Posiziona il progetto nella cartella ⁠ htdocs ⁠ di XAMPP.
3.⁠ ⁠Crea un database MySQL chiamato ⁠ autori_italiani_db ⁠ e importa il file SQL per creare le tabelle.
4.⁠ ⁠Configura il file PHP nella cartella ⁠ backend ⁠ con le credenziali corrette del database.
5.⁠ ⁠Apri il browser e vai alla homepage del sito per iniziare la navigazione.

## Possibili Sviluppi Futuri
•⁠  ⁠Aggiungere una funzionalità di ricerca avanzata e filtraggio (es. per genere o anno di pubblicazione).
•⁠  ⁠Implementare un sistema di login per gli utenti per salvare autori preferiti.
•⁠  ⁠Migliorare il design con animazioni CSS o JavaScript.
•⁠  ⁠Estendere il database con altri autori e correnti letterarie.

## Team
•⁠  ⁠*Duceag Massimiliano Lorenzo*: Documentazione, test, supporto per frontend e backend.
•⁠  ⁠*Michetti Alessandro*: Backend e database (progettazione e gestione delle tabelle).
•⁠  ⁠*Cerelli Simone*: Frontend e design (sviluppo dell’interfaccia utente).


---

*Grazie per aver valutato il nostro progetto!*