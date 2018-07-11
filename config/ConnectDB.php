<?php
$conn = mysqli_connect('192.168.10.10', 'homestead', 'secret','bookmvc');
if ($conn->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


