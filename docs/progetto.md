# Progetto Sito Autori Italiani

## Introduzione
Questo progetto scolastico consiste in un sito web che permette di cercare autori italiani e le loro opere, utilizzando un database per gestire i dati. È stato realizzato da un team di tre studenti per dimostrare competenze nell’uso di database, backend e frontend.

## Struttura del Database
Il database si chiama `autori_italiani_db` ed è composto da due tabelle:

- **autori**:
  - `id`: Numero univoco per ogni autore (chiave primaria, auto-incrementante).
  - `nome`: Nome dell’autore (es. "Dante", obbligatorio).
  - `cognome`: Cognome dell’autore (es. "Alighieri", obbligatorio).
  - `data_nascita`: Data di nascita (es. "1265-05-01").
  - `luogo_nascita`: Luogo di nascita (es. "Firenze").
  - `biografia`: Descrizione dell’autore (testo opzionale).

- **opere**:
  - `id`: Numero univoco per ogni opera (chiave primaria, auto-incrementante).
  - `titolo`: Titolo dell’opera (es. "Divina Commedia", obbligatorio).
  - `anno_pubblicazione`: Anno di pubblicazione (es. 1320).
  - `genere`: Genere dell’opera (es. "Poesia").
  - `autore_id`: Collega l’opera all’autore (chiave esterna che punta a `autori.id`).

## Funzionalità
- Ricerca di autori per nome o cognome.
- Ricerca di opere per titolo o genere.
- Visualizzazione di dettagli per ogni autore (biografia e lista opere) e opera (titolo, anno, autore).

## Tecnologie
- **Database**: MySQL
- **Backend**: PHP
- **Frontend**: HTML, CSS
- **Gestione del codice**: Git e GitHub

## Team
- [Duceag Massimiliano Lorenzo]: Documentazione e test + eventuali aiuti per frontend e backend.
- [Michetti Alessandro]: Backend e database (creazione e gestione del database).
- [Cerelli Simone]: Frontend e design (interfaccia del sito)