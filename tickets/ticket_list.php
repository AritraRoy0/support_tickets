<?php include '../view/header.php'; ?>
<main>
    <h2>All Tickets</h2>
    <p><a class="button" href="?action=show_add_form">+ New Ticket</a></p>
    <?php if (empty($tickets)): ?>
        <p>No tickets have been submitted yet.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Submitted By</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Created</th>
            </tr>
            <?php foreach ($tickets as $ticket): ?>
                <?php
                // Highlight high-priority tickets
                if ($ticket['priority'] == 'High') {
                    $priority_class = 'high';
                } else {
                    $priority_class = '';
                }
                ?>
                <tr>
                    <td>
                        <?php echo $ticket['ticket_id']; ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($ticket['title']); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($ticket['category']); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($ticket['submitted_by']); ?>
                    </td>
                    <td class="<?php echo $priority_class; ?>">
                        <?php echo htmlspecialchars($ticket['priority']); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($ticket['status']); ?>
                    </td>
                    <td>
                        <?php echo $ticket['created_at']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</main>
<?php include '../view/footer.php'; ?>