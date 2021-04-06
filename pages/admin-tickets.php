<?php

session_start();

//loading xml file
$xml = simplexml_load_file("../xml/support_ticket.xml") or die("Error: cannot create object");

//session variables
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

$rows = '';

//foreach loop for display ticket information
foreach ($xml->children() as $p) {
    $rows .= '<tr>';
    //redirecting to correct ticket ID
    $rows .= '<td><a href="admin-response.php?ticketid=' . $p->identification->ticket_id . '">' . $p->identification->ticket_id . '</a></td>';
    $rows .= '<td>' . $p->ticket_content->datetime . '</td>';
    $rows .= '<td>' . $p->ticket_content->subject . '</td>';
    $rows .= '<td>' . $p->ticket_content->message . '</td>';
    $rows .= '<td>' . $p->ticket_followup->ticket_status . '</td>';
    $rows .= '</tr>';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADMIN TICKETS</title>
    <link rel="stylesheet" href="../css/admin-tickets.css" />
</head>

<body>

    <h1>Tickets: View All</h1>
    <table class="adminTickets">
        <thead>
            <th>Ticket ID</th>
            <th>Date / Time Issued</th>
            <th>Subject</th>
            <th>Ticket Message</th>
            <th>Admin Response</th>
            <th>STATUS</th>
        </thead>
        <tbody>
            <!-- Printing XML Data into table -->
            <?php echo $rows ?>
        </tbody>
    </table>
    <a href='logout.php'>Click here to log out</a>



</body>



</html>