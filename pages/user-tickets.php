<?php
session_start();

//loading xml file
$xmlusers = simplexml_load_file("../xml/users.xml") or die("Error: cannot create object");

$rows = '';
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

if (file_exists("../xml/support_ticket.xml")) {
    $xml = simplexml_load_file("../xml/support_ticket.xml") or die("Error: cannot create object");
    //foreach loop for display ticket information
    foreach ($xml->children() as $p) {
        if ($p->identification->userid == $userid) {
            $rows .= '<tr>';
            $rows .= '<td><a href="ticket-details.php?test=' . $p->identification->ticket_id . '">' . $p->identification->ticket_id . '</a></td>';
            $rows .= '<td>' . $p->ticket_content->datetime . '</td>';
            $rows .= '<td>' . $p->ticket_content->subject . '</td>';
            $rows .= '<td>' . $p->ticket_content->message . '</td>';
            $rows .= '<td>' . $p->ticket_followup->ticket_status . '</td>';
            $rows .= '</tr>';
        }
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Tickets</title>
    <link rel="stylesheet" href="../css/view-tickets.css" />
</head>

<body>

    <h1>Your Tickets</h1>

    <table class="userTickets">
        <thead>
            <th>Ticket ID</th>
            <th>Date / Time Issued</th>
            <th>Subject</th>
            <th>Ticket Details</th>
            <th>STATUS</th>
        </thead>
        <tbody>
            <!-- Printing XML Data into table -->
            <?php echo $rows ?>
        </tbody>
    </table>
</body>



</html>