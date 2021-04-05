<?php

if (isset($_POST['submit'])) {
    $selectedTicket = $_POST["ticketDetails"];

}

//loading xml file
$xml = simplexml_load_file("../xml/support_ticket.xml") or die("Error: cannot create object");
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
            <?php foreach ($xml->support_ticket as $support_ticket): ?>
            <!-- Printing XML Data into table -->
            <tr>
                <td><?php echo $support_ticket->identification->ticket_id ?></td>
                <td><?php echo $support_ticket->ticket_content->message ?></td>
                <td><?php echo $support_ticket->ticket_followup->response ?></td>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <form action="pages/user-tickets.php" method="post">
        <input type="submit" value="Back to Tickets" />
    </form>


</body>



</html>