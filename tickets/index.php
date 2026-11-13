<?php
require('../model/ticket_data.php');

// Get the action: check POST first (form submits), then GET (links)
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_tickets';   // default action
    }
}

if ($action == 'list_tickets') {
    $tickets = get_tickets();
    include('ticket_list.php');

} else if ($action == 'show_add_form') {
    $categories = get_categories();
    $priorities = get_priorities();
    include('ticket_form.php');

} else if ($action == 'add_ticket') {
    // Get the form data
    $submitted_by = trim(filter_input(INPUT_POST, 'submitted_by') ?? '');
    $title = trim(filter_input(INPUT_POST, 'title') ?? '');
    $category = filter_input(INPUT_POST, 'category');
    $priority = filter_input(INPUT_POST, 'priority');
    $description = trim(filter_input(INPUT_POST, 'description') ?? '');

    // The form needs these again if we have to redisplay it
    $categories = get_categories();
    $priorities = get_priorities();
    // Validate the data
    $errors = [];

    if ($submitted_by == '') {
        $errors[] = 'Please enter your name.';
    }

    if ($title == '') {
        $errors[] = 'Title is required.';
    } else if (strlen($title) > 100) {
        $errors[] = 'Title must be 100 characters or less.';
    }

    if (!in_array($category, $categories)) {
        $errors[] = 'Please choose a category.';
    }

    if (!in_array($priority, $priorities)) {
        $errors[] = 'Please choose a priority.';
    }

    if (strlen($description) < 10) {
        $errors[] = 'Description must be at least 10 characters.';
    }

    // Show the form again with errors, or show the confirmation
    if (!empty($errors)) {
        include('ticket_form.php');
    } else {
        include('ticket_added.php');
    }


} else {
    echo 'Unknown action: ' . htmlspecialchars($action);
}