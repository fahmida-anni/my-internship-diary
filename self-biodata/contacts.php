<?php
//step 1
//we'll receive html data from html form

$name = $_POST["name"];
$number = $_POST["phn_num"];
$email = $_POST["email"];
$address = $_POST["address"];

//step 2
//connect with database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phonebook";

//create connection
$conn = new mysqli( $servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
	die("Connection Failed: ". $conn->connect_error);
}

//step 3
//insert data into database
$sql =" INSERT INTO contacts (name, phone, email, address) VALUES ('{$name}', '{$number}', '{$email}', '{$address}')";
if ($conn->query($sql)) {
	echo "Data Inserted";
}else{
	echo "Data Not Inserted ";
}
?>


<html>
	<head>
		<title>Address Book</title>
	</head>
	<body>
		<table>
			<tr>
				<th>Name</th>
				<th>Mobile Number</th>
				<th>Email</th>
				<th>Address</th>
			</tr>

<?php
$sql =" SELECT * FROM contacts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
?>
			<tr>
				<td> <?php echo $row['name']; ?> </td>
				<td> <?php echo $row['phone']; ?> </td>
				<td> <?php echo $row['email']; ?> </td>
				<td> <?php echo $row['address']; ?> </td>
			</tr>
<?php

	}	
}
$conn->close();
?>
			
		</table>
	</body>

</html>

