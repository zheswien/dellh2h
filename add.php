<?php
$eventtype = $_POST["eventtype"];
$eventname = filter_input(INPUT_POST, 'eventname');
$datepicker = filter_input(INPUT_POST, 'datepicker');
$appt = filter_input(INPUT_POST, 'appt');
$appt1 = filter_input(INPUT_POST, 'appt1');
$venue = filter_input(INPUT_POST, 'venue');
$description = filter_input(INPUT_POST, 'description');
$compulsory = $_POST["compulsory"];

if (!empty($eventname || !empty($date))) {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "delldb";
        // Create connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        } else {
            $sql = "INSERT INTO event_table (eventtype, eventname, datepicker, appt, appt1, venue, description, compulsory) values ('$eventtype', '$eventname','$datepicker', '$appt', '$appt1', '$venue', '$description', '$compulsory')";
            if ($conn->query($sql)) {
                echo "New record is inserted sucessfully";
            } else {
                echo "Error: " . $sql . "
" . $conn->error;
            }
            $conn->close();
        }

} else {
    echo "Event name should not be empty";
    die();
}