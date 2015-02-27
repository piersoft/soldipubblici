
<?php

//extract data from the post
extract($_POST);

//set POST variables
$url = 'http://soldipubblici.gov.it/it/ricerca';


//open connection
$ch = curl_init();

$file = fopen('spese.json', 'w+'); //da decommentare se si vuole il file locale

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=UTF-8','Accept: Application/json','X-Requested-With: XMLHttpRequest','Content-Type: application/octet-stream','Content-Type: application/download','Content-Type: application/force-download','Content-Transfer-Encoding: binary '));
curl_setopt($ch,CURLOPT_POSTFIELDS, 'codicecomparto=PRO&codiceente=011135934&chi=Comune+di+Matera&cosa=');
// la riga successiva salva in locale il file spese.json
curl_setopt($ch, CURLOPT_FILE, $file);

curl_exec($ch);

curl_close($ch);

//fclose($file);


$homepage = file_get_contents('spese.json');
//echo $homepage;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Spese correnti Comune di Matera CSV script</title>
		<meta charset="utf-8">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
		<script src="parser/papaparse.js"></script>

<script type="text/javascript"> 

 function inizio() { 
 var results = Papa.unparse(<?php printf(file_get_contents('spese.json')) ?>, {
			delimiter: ","
		});

		// console.log(results); 

    var link = document.createElement('a');
    link.download = 'spese_correnti.csv';
    link.href = 'data:,' + encodeURIComponent(
results
	)
;
    link.click();


//document.write(results);

/*
location.href='data:text/csv;charset=UTF-8,' + encodeURIComponent(
results
	)

*/


 } 


inizio();


 </script>

<body>
</body>

</head>
</html>