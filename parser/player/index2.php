
<?php
$homepage = file_get_contents('spese.json');
echo $homepage;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Papa Parse Player</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="player.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
		<script src="../papaparse.js"></script>

<script type="text/javascript"> 

 function inizio() { 
 var results = Papa.unparse(<?php printf(file_get_contents('http://dati.comune.matera.it/blog/json/spese.json')) ?>, {
			delimiter: ","
		});

		// console.log(results); 
location.href='data:text/csv;charset=UTF-8,' + encodeURIComponent(
results
	)



 } 


inizio();


 </script>

<body>
</body>

</head>
</html>