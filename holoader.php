<?php

/**
 * Hoodai php file loader for single page apps
 */
$hos = [
    'loadtasks',
    'savetask',
    'updatetask',
    'deletetask'
];
foreach ($hos as $value) {
    include $value . ".php";
}
