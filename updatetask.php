<?php
if (isset($_POST)) {
    $accepted_names = ['task-status-continue', 'task-status-complete'];
    $save = FALSE;
    foreach ($_POST as $key => $value) {
        $index = $value;
        if (in_array($key, $accepted_names) && isset($index)) {
            switch ($key) {
                case 'task-status-continue':
                    $tasks[$index]['task-complete'] = "";
                    $save = TRUE;
                    break;
                case 'task-status-complete':
                    $tasks[$index]['task-complete'] = date('Y-m-d');
                    $save = TRUE;
                    break;
            }
        }
    }
    if ($save) {
        $encodedTasks = json_encode($tasks);
        file_put_contents("data.json", $encodedTasks);
        unset($_POST);
        header("Location: " . $_SERVER['PHP_SELF']);
    }
}