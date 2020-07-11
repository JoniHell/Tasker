<?php

if (isset($_POST)) {
    $accepted_names = ['task-delete'];
    $save = FALSE;
    foreach ($_POST as $key => $value) {
        $index = $value;
        if (in_array($key, $accepted_names) && isset($index)) {
            switch ($key) {
                case 'task-delete':
                    unset($tasks[$index]);
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