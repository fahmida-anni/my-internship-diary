<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		My PhoneBook
	</title>
</head>
<body>
	<form action="./contacts.php" method="POST">
		<table>
			<caption> Enter Contact Details </caption>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name"/></td>
			</tr>
			<tr>
				<td>Mobile Number </td>
				<td><input type="text" name="phn_num"/></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email"/></td>
			</tr>
			<tr>
				<td>Address</td>
				<td>
					<textarea name="address" rows="5" cols="20">
						
					</textarea>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="ADD Contact"/></td>
			</tr>
		</table>
	</form>
</body>
</html>