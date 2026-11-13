<?php include '../view/header.php'; ?>
<main>
    <h2>Ticket Submitted</h2>

    <div class="success">
        Thank you, <?php echo htmlspecialchars($submitted_by); ?>!
        Your ticket has been received.
    </div>

    <table>
        <tr>
            <th>Title</th>
            <td><?php echo htmlspecialchars($title); ?></td>
        </tr>
        <tr>
            <th>Category</th>
            <td><?php echo htmlspecialchars($category); ?></td>
        </tr>
        <tr>
            <th>Priority</th>
            <td><?php echo htmlspecialchars($priority); ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td>Open</td>
        </tr>
        <tr>
            <th>Description</th>
            <td><?php echo nl2br(htmlspecialchars($description)); ?></td>
        </tr>
    </table>

    <p>
        <a class="button" href="?action=show_add_form">Submit Another</a>
        <a class="button secondary" href=".">View All Tickets</a>
    </p>
</main>
<?php include '../view/footer.php'; ?>