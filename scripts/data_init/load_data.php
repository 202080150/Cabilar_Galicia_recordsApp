<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "recordsapp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

setlocale(LC_ALL, 'en_PH');

for ($i = 1; $i <= 50; $i++) {
    $name = "Office " . $i;
    $contactnum = rand(1000000000, 9999999999);
    $email = "office" . $i . "@example.com";
    $address = "Address " . $i;
    $city = "City " . $i;
    $country = "Philippines";
    $postal = "1000" . $i;

    $sql = "INSERT INTO Office (name, contactnum, email, address, city, country, postal) VALUES ('$name', $contactnum, '$email', '$address', '$city', '$country', '$postal')";
    $conn->query($sql);
}


for ($i = 1; $i <= 200; $i++) {
    $lastname = "Lastname " . $i;
    $firstname = "Firstname " . $i;
    $office_id = rand(1, 50);
    $address = "Address " . $i;

    $sql = "INSERT INTO Employee (lastname, firstname, office_id, address) VALUES ('$lastname', '$firstname', $office_id, '$address')";
    $conn->query($sql);
}

$conn->close();

echo "Fake data has been loaded into the database.";
?>
