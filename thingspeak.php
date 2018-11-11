<?php
	$url = "https://api.thingspeak.com/channels/584824/feeds.json?api_key=Y6LO9XZPZB02XSSW&results=10";
	$jsonCont = file_get_contents($url);
	// echo $jsonCont;
	// echo "<br><hr>";
	$content = json_decode($jsonCont, true);
?>
<html>
	<head>
		<title>Environment Monitoring</title>
	</head>

	<body>
		<h1 style="text-align:center;"><?php echo $content["channel"]["name"]; ?></h1>
		<table border="1px">
			<tr>
				<td><b><?=$content["channel"]["field1"]?> (*C)</b></td>
				<td><b><?=$content["channel"]["field2"]?> (%)</b></td>
			</tr>
			<?php foreach ($content["feeds"] as $feed) { ?>
			<tr>
				<td><?=$feed['field1']?></td>
				<td><?=$feed['field2']?></td>
			</tr>
			<?php } ?>
		</table>
		<iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/584824/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=10&type=line&update=15"></iframe>
		<iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/584824/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=10&type=line&update=15"></iframe>
	</body>
</html>