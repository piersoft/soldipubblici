<?php
/*
curl -i -X POST http://soldipubblici.gov.it/it/ricerca -H "Content-Type: application/x-www-form-urlencoded; charset=UTF-8" -H "Accept: Application/json" -H "X-Requested-With: XMLHttpRequest" --data "codicecomparto=PRO&codiceente=011135934&chi=Comune+di+Matera&cosa=" > spese.json
*/

//extract data from the post
extract($_POST);

//set POST variables
$url = 'http://soldipubblici.gov.it/it/ricerca';


//open connection
$ch = curl_init();

$file = fopen('spese.json', 'w+');
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");

//this line is important its makes the file name
header("Content-Disposition: attachment;filename=spese.json");

header("Content-Transfer-Encoding: binary ");

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=UTF-8','Accept: Application/json','X-Requested-With: XMLHttpRequest','Content-Type: application/octet-stream','Content-Type: application/download','Content-Type: application/force-download','Content-Transfer-Encoding: binary '));
curl_setopt($ch,CURLOPT_POSTFIELDS, 'codicecomparto=PRO&codiceente=011135934&chi=Comune+di+Matera&cosa=');
//curl_setopt($ch, CURLOPT_FILE, $file);
//echo curl_exec($ch);

//execute post
//$result = curl_exec($ch);
curl_exec($ch);
//close connection

curl_close($ch);

fclose($file);

?>