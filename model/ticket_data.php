<?php
// MODEL: provides data to the rest of the app.
// For now the data is stored in arrays.
// In Milestone 2 these functions will query MySQL with PDO instead.

function get_categories() {
    $categories = ['Hardware', 'Software', 'Network', 'Email', 'Account Access'];
    return $categories;
}

function get_priorities() {
    return ['Low', 'Medium', 'High'];
}

function get_tickets() {
    $tickets = [
        [
            'ticket_id'    => 1024,
            'title'        => 'Printer in Library jams',
            'category'     => 'Hardware',
            'submitted_by' => 'Jordan Smith',
            'priority'     => 'High',
            'status'       => 'Open',
            'created_at'   => '2026-11-07'
        ],
        [
            'ticket_id'    => 1023,
            'title'        => 'Cannot connect to campus Wi-Fi',
            'category'     => 'Network',
            'submitted_by' => 'Maria Lopez',
            'priority'     => 'Medium',
            'status'       => 'In Progress',
            'created_at'   => '2026-11-06'
        ],
    ];
    return $tickets;
}