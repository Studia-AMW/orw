
<html>

<head>
	<title>ORW_Lab5_Siemaszko - Zadania okresowe</title>
	<meta charset='utf-8'>
</head>

<body>

<?php
$myfile = fopen("cron.txt", "a") or die("Nie można otworzyć pliku.");
$txt = date('d.m.Y h:i:sa ');
fwrite($myfile, $txt."<br>"."\r\n");
fclose($myfile);
?>


	<p>Data i godzina zapisywana do pliku cron.txt raz na godzine dzięki zadaniom okresowym Cron</p>
	<table>
	<tr>
	<th>Rok</th>
	<th>Miesiąc</th>
	<th>Dzień</th>
	<th>Godzina</th>
	</tr>
	<tr>
	<td><?php echo date('Y') ?></td>
	<td><?php echo date('m') ?></td>
	<td><?php echo date('d') ?></td>
	<td><?php echo date('h:i:sa') ?></td>
	</tr>
	</table>
	
	<p>Data wykonania skryptu:</p>
	<div id="cron">  </div>
	
<script>
	var aktualizuj = setInterval(cron, 500);

	function cron() {

		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			  document.getElementById("cron").innerHTML = xhttp.responseText;
			}
		  };
		  xhttp.open("GET", "cron.txt", true);
		  xhttp.send();
 
		
	}
</script>
	
</body>

</html>

<!-- Wysyłanie wiadomości email -->

<?php
$to = "studia.amw@gmail.com, siemaszko.stanislaw@gmail.com";
$subject = "ORW_Lab5_Siemaszko - Zadania okresowe";

$message = "
<html>

<head>
	<title>ORW_Lab5_Siemaszko - Zadania okresowe</title>
	<meta charset='utf-8'>
</head>

<body>
	<p>Wiadomość wysyłana raz na godzine dzięki zadaniom okresowym Cron</p>
	<table>
	<tr>
	<th>Rok</th>
	<th>Miesiąc</th>
	<th>Dzień</th>
	<th>Godzina</th>
	</tr>
	<tr>
	<td>".date('Y')."</td>
	<td>".date('m')."</td>
	<td>".date('d')."</td>
	<td>".date('h:i:sa')."</td>
	</tr>
	</table>
</body>

</html>
";

// Ustawienie typu zawartości i kodowania
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// nadawca i adresat
$headers .= 'From: <Siemaszko.Stanislaw@gmail.com>' . "\r\n";
$headers .= 'Cc: studia.amw@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);
?>