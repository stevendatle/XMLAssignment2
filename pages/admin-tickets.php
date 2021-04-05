<?php

//loading xml file
$xml = simplexml_load_file("../xml/support_ticket.xml") or die("Error: cannot create object");
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
            <th>User ID</th>
            <th>Ticket ID</th>
            <th>Date / Time Issued</th>
            <th>Subject</th>
            <th>Ticket Message</th>
            <th>Admin Response</th>
            <th>STATUS</th>
        </thead>
        <tbody>
            <?php foreach ($xml->support_ticket as $support_ticket): ?>
            <!-- Printing XML Data into table -->
            <tr>
                <td><?php echo $support_ticket->identification->userid ?></td>
                <td><?php echo $support_ticket->identification->ticket_id ?></td>
                <td><?php echo $support_ticket->ticket_content->datetime ?></td>
                <td><?php echo $support_ticket->ticket_content->subject ?></td>
                <td><?php echo $support_ticket->ticket_content->message ?></td>
                <td><?php echo $support_ticket->ticket_followup->response ?></td>
                <td><?php echo $support_ticket->ticket_followup->ticket_status ?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>



</body>



</html>