<!DOCTYPE html>
<html>
<head>

	<title>ORW_Lab6_Siemaszko - WebAPI</title>
	<meta charset='utf-8'>

<style>
	table {
		width: 100%;
		border-collapse: collapse;
	}

	table, td, th {
		border: 1px solid black;
		padding: 5px;
	}

	th {text-align: left;}
</style>

</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('mysql.hostinger.pl','u544586475_api','AMW1556','u544586475_api');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"webapi");
$sql="SELECT * FROM kraje WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Kraj</th>
<th>Kod ISO</th>
<th>Tablice samochodowe</th>
<th>Waluta</th>
<th>Telefon</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Kraj'] . "</td>";
    echo "<td>" . $row['KodISO'] . "</td>";
    echo "<td>" . $row['Tablice'] . "</td>";
    echo "<td>" . $row['Waluta'] . "</td>";
    echo "<td>" . $row['Telefon'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>