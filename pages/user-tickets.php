<?php

//loading xml file
$xml = simplexml_load_file("../xml/support_ticket.xml") or die("Error: cannot create object");
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
            <?php foreach ($xml->support_ticket as $support_ticket): ?>
            <!-- Printing XML Data into table -->
            <tr>
                <td><?php echo $support_ticket->identification->ticket_id ?></td>
                <td><?php echo $support_ticket->ticket_content->datetime ?></td>
                <td><?php echo $support_ticket->ticket_content->subject ?></td>
                <td>
                    <form action="ticket-details.php" method="post">
                        <input type="hidden" name="ticketDetails"
                            value="<?=$support_ticket->identification->ticket_id;?>" />
                        <input type="submit" class="button" name="ticketDetails" value="View Ticket" />
                    </form>
                </td>
                <td><?php echo $support_ticket->ticket_followup->ticket_status ?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>



</html>