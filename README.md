# soldipubblici
script che interroga ed estrae tutte le spese per un determinato ente 

in questo esempio:

codicecomparto=PRO&codiceente=011135934&chi=Comune+di+Matera&cosa=

è il Comune di Matera con cosa= lasciato appositamente non popolato per estrarre tutte le voci

Licenza CC-BY sui contenuti e AGPL sul codice 

index.php --> estrae i dati in formato json

csv.php (richiede la cartella parser e il file spese.json con permessi di scrittura) --> rilascia la versione convertita in CSV con separatore di campo virgola (,) 

