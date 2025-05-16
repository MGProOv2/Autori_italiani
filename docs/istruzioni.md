# Istruzioni per il Team

## Come Aggiornare il Progetto
1. Apri il terminale nella cartella del progetto (`Autori-italiani`).
2. Passa al branch principale: `git checkout main`
3. Scarica gli ultimi aggiornamenti: `git pull origin main`

## Come Caricare il Tuo Lavoro
1. Passa al tuo branch: `git checkout <nome>` (es. `duceag`, `michetti`, `cerelli`).
2. Aggiungi i tuoi file: `git add .`
3. Salva le modifiche con un messaggio: `git commit -m "Aggiunto <cosa hai fatto>"`
4. Carica su GitHub: `git push origin <nome>`
5. Vai su GitHub, clicca su “Pull requests”, poi “New pull request”. Scegli il tuo branch (es. `duceag`) e clicca “Create pull request”. Chiedi al team di controllare.

## Come Testare il Database
1. Installa XAMPP e avvia MySQL.
2. Apri phpMyAdmin e importa il file `backend/database/autori_italiani_db.sql`.
3. Controlla la struttura del database:
   - Verifica che le tabelle `autori` e `opere` siano presenti con il comando: `SHOW TABLES;`
   - Clicca su ogni tabella in phpMyAdmin per vedere i campi (es. `id`, `nome`, `cognome` per `autori`).
4. (Quando saranno aggiunti dati di test): Prova una query come `SELECT * FROM autori;` per vedere se i dati appaiono correttamente.