## Progetto Finale di Juri Cerretani

### Setup

Per provare sul vostro dispositivo il mio progetto esportate i file della mia repository GitHub ed richiedete una chiave API al sito coinmarketcap.
Una volta fatto ciò modificate il file .env.example in .env e inserite le configurazioni del vostro database e la vostra chiave API (io ho utilizzato XAMPP per creare un database virtuale).
Infine tramite il terminale utilizzate php artisan migrate per inserire le tabelle della cartella migrations nel vostro database e  php artisan serve per inizializzare il progetto in locale

### Progetto

Realizza un'app per il frontend, che sia una single-page-application o una multi-page-application, che possa gestire delle chiamate ad API RESTful, da te sviluppate, che implementino un sistema di login/logout e registrazione dell'utente.
Aggiungi poi, alle API, delle funzionalità a tuo piacimento.

### Idea

Nella realizzazione di questo progetto ho avuto molte idee riguardo a come e che funzionalità implementare, la scelta libera mi ha lasciato spazio alla creatività.
Cosi ho deciso di creare un sito che innanzitutto sia utile a me!
Da più di un anno ormai mi interesso e investo nelle criptovalute e più di una volta mi sono trovato davanti al solito problema:
Investendo su vari assets non riuscivo, in modo semplice, a capire le perdite e i guadagni da quali asset era dovuti.
Per questo motivo ho creato questo sito, che ha queste funzioni:
Registrazione, Accesso, Disconnessione utente
e per ogni utente registrazione e eliminazione di assets.

### Perché Laravel?

Per questo progetto ho deciso di utilizzare il framework per PHP Laravel per diversi motivi:
Laravel suggerisce già nella creazione della folder il modello MVC (Model View Controller), prima di questo progetto avevo sottovalutato le potenzialità dell'MVC ma in fase di produzione mi sono reso contro che senza di esso il mio progetto sarebbe risultato confuso e disorganizzato.
In più ho deciso di utilizzare Laravel perché permette tramite dei comandi dal terminale di essere più rapido ed efficiente in fase di produzione.

### Struttura folder

La struttura del progetto come già anticipato prima segue il modello MVC i file più importanti sono:
* routes/web.php che attiva in controllers in base alla uri che sta richiedendo l'utente.
* app/http/controllers dove vengono definiti i controllers che vengono 'triggerati' dalle routes e che caricano i Models e restituiscono le Views.
* resources/views che contiene le views utilizzate dal progetto.
* app/Models dove vengono definiti i Models
