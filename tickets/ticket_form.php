<?php
// Default values for the first time the form loads
if (!isset($submitted_by)) {
    $submitted_by = '';
}
if (!isset($title)) {
    $title = '';
}
if (!isset($category)) {
    $category = '';
}
if (!isset($priority)) {
    $priority = '';
}
if (!isset($description)) {
    $description = '';
}
?>
<?php include '../view/header.php'; ?>
<main>
    <h2>Submit a New Ticket</h2>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <p><strong>Please fix the following:</strong></p>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="." method="post">
        <input type="hidden" name="action" value="add_ticket">

        <label>Your Name:</label>
        <input type="text" name="submitted_by" value="<?php echo htmlspecialchars($submitted_by); ?>">

        <label>Title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">

        <label>Category:</label>
        <select name="category">
            <option value="">-- Select a category --</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?php echo $cat; ?>" <?php if ($cat == $category) {
                       echo 'selected';
                   } ?>>
                    <?php echo $cat; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Priority:</label>
        <select name="priority">
            <option value="">-- Select a priority --</option>
            <?php foreach ($priorities as $pri): ?>
                <option value="<?php echo $pri; ?>" <?php if ($pri == $priority) {
                       echo 'selected';
                   } ?>>
                    <?php echo $pri; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Description:</label>
        <textarea name="description"><?php echo htmlspecialchars($description); ?></textarea>

        <input type="submit" class="button" value="Submit Ticket">
    </form>
</main>
<?php include '../view/footer.php'; ?>