<?php
session_start();

$rows = '';
//session variables
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

//loading xml users file
if (file_exists("../xml/support_ticket.xml")) {
    $xml = simplexml_load_file("../xml/support_ticket.xml") or die("Error: cannot create object");
    //foreach loop for display ticket information
    foreach ($xml->children() as $p) {
        if ($p->identification->userid == $userid) {
            $rows .= '<tr>';
            //redirecting user to correct ticket ID
            $rows .= '<td><a href="ticket-details.php?ticketid=' . $p->identification->ticket_id . '">' . $p->identification->ticket_id . '</a></td>';
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
    <!-- LOGOUT -->
    <a href='logout.php'>Click here to log out</a>
</body>



</html>