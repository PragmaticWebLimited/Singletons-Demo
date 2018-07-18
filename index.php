<?php
require_once 'object-singleton.php';
require_once 'static-singleton.php';

sleep( 1 );
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Singletons Demo </title>
		<style type="text/css">
			table {
				border-collapse: collapse;
			}
			th, td {
				padding: 3px 6px;
			}
			tr:nth-of-type(2n) {
				background-color: #eee;
			}
		</style>
	</head>
	<body>

		<h1> Requester Info </h1>
		<p>This page demonstrates the calling conventions for object singletons and static classes.</p>
		<p>We expect that both columns have the same values, as we are demonstrating that these two techniques for global data containers are equivalent.</p>
		<table>
			<tr>
				<th>Data</th>
				<th>Singleton Value</th>
				<th>Static Class Value</th>
			</tr>
			<tr>
				<td>IP:</td>
				<td><?php echo SingletonRequestData::GetInstance()->GetRequesterIP(); ?></td>
				<td><?php echo StaticRequestData::GetRequesterIP(); ?></td>
			</tr>
			<tr>
				<td>Connection Unix Time</td>
				<td><?php echo SingletonRequestData::GetInstance()->GetConnectionUnixTime(); ?></td>
				<td><?php echo StaticRequestData::GetConnectionUnixTime(); ?></td>
			</tr>
			<tr>
				<td>Connection ISO Time</td>
				<td><?php echo SingletonRequestData::GetInstance()->GetConnectionISOTime(); ?></td>
				<td><?php echo StaticRequestData::GetConnectionISOTime(); ?></td>
			</tr>
			<tr>
				<td>Connection Age</td>
				<td><?php echo SingletonRequestData::GetInstance()->GetConnectionAge(); ?></td>
				<td><?php echo StaticRequestData::GetConnectionAge(); ?></td>
			</tr>
			<tr>
				<td>GET variables</td>
				<td><?php print_r( SingletonRequestData::GetInstance()->GetGetVariables() ); ?></td>
				<td><?php print_r( StaticRequestData::GetGetVariables() ); ?></td>
			</tr>
		</table>

	</body>
</html>
