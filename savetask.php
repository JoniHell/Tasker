<?php
if (isset($_POST)) {
    $accepted_names = ['task-name', 'task-goal', 'task-start'];
    $data = [];
    $save = FALSE;
    foreach ($_POST as $key => $value) {
        if (in_array($key, $accepted_names)) {
            switch ($key) {
                case 'task-name':
                    if (strlen($value)) {
                        $data[$key] = utf8_encode($value);
                        $save = TRUE;
                    } else {
                        print_r('<pre>');
                        print_r('Task name empty');
                        print_r('</pre>');
                    }
                    break;
                case 'task-goal':
                    try {
                        $dateTimeObject = (array) new DateTime($value);
                        $data[$key] = date('Y-m-d', strtotime($dateTimeObject['date']));
                    } catch (Exception $exc) {
                        print_r('<pre>');
                        print_r('Check time format on goal');
                        print_r('</pre>');
                    }
                    break;
                case 'task-start':
                    try {
                        $dateTimeObject = (array) new DateTime($value);
                        $data[$key] = date('Y-m-d', strtotime($dateTimeObject['date']));
                    } catch (Exception $exc) {
                        print_r('<pre>');
                        print_r('Check time format on start');
                        print_r('</pre>');
                    }
                    break;
            }
        }
    }
    if ($save) {
        $data['task-created'] = date('Y-m-d');
        $data['task-complete'] = "";
        array_push($tasks, $data);
        $encodedTasks = json_encode($tasks);
        file_put_contents("data.json", $encodedTasks);
        header("Location: " . $_SERVER['PHP_SELF']);
    }

}