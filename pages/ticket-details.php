<?php

session_start();

//loading xml file
$xml = simplexml_load_file("../xml/support_ticket.xml") or die("Error: cannot create object");

$rows = '';

$link = $_GET['test'];

foreach ($xml->children() as $p) {

    if ($p->identification->ticket_id == $link) {
        $rows .= '<tr>';
        $rows .= '<td>' . $p->identification->ticket_id . '</td>';
        $rows .= '<td>' . $p->ticket_content->message . '</td>';
        $rows .= '<td>' . $p->ticket_followup->response . '</td>';
        $rows .= '</tr>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Tickets</title>
    <link rel="stylesheet" href="../css/ticket-details.css" />
</head>

<body>

    <h1>Ticket Details</h1>

    <table class="ticketDetails">
        <thead>
            <th>Ticket ID</th>
            <th>Ticket Message</th>
            <th>Admin Response</th>
        </thead>
        <tbody>
            <!-- Printing XML Data into table -->
            <tr>
                <td><?php print $rows;?> </td>
            </tr>
        </tbody>
    </table>

    <form action="user-tickets.php" method="post">
        <input type="submit" value="Back to Tickets" />
    </form>


</body>



</html>