# Progetto Sito Autori Italiani

## Introduzione
Questo progetto scolastico consiste in un sito web che permette di cercare autori italiani e le loro opere, utilizzando un database per gestire i dati. È stato realizzato per dimostrare le nostre competenze nell’uso di database, backend e frontend.

## Struttura del Database
Il database si chiama `autori_italiani_db` ed è composto da due tabelle:

- **autori**:
  - `id`: Numero univoco (chiave primaria, auto-incrementante).
  - `nome`: Nome dell’autore (es. "Dante", obbligatorio).
  - `cognome`: Cognome dell’autore (es. "Alighieri", obbligatorio).
  - `data_nascita`: Data di nascita (es. "1265-05-01").
  - `luogo_nascita`: Luogo di nascita (es. "Firenze").
  - `biografia`: Descrizione dell’autore (opzionale).

- **opere**:
  - `id`: Numero univoco (chiave primaria, auto-incrementante).
  - `titolo`: Titolo dell’opera (es. "Divina Commedia", obbligatorio).
  - `anno_pubblicazione`: Anno di pubblicazione (es. 1320).
  - `genere`: Genere dell’opera (es. "Poesia").
  - `autore_id`: Collega l’opera all’autore (chiave esterna).

## Funzionalità
- Cercare autori per nome o cognome.
- Cercare opere per titolo o genere.
- Mostrare dettagli di autori (biografia, opere) e opere (titolo, anno, autore).

## Tecnologie
- **Database**: MySQL
- **Backend**: PHP
- **Frontend**: HTML, CSS
- **Versionamento**: Git e GitHub

## Stato del Progetto
- Database completato e testato.
- Backend in fase di sviluppo (connessione al database).
- Frontend in fase di progettazione.

## Team
- Duceag Massimiliano Lorenzo: Documentazione, test e supporto per frontend/backend.
- Michetti Alessandro: Backend e database (creazione e gestione del database).
- Cerelli Simone: Frontend e design (interfaccia del sito).

## Obiettivo Didattico
Questo progetto dimostra la nostra capacità di progettare un database, collegarlo a un sito web.