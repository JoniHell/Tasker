<?php
include "holoader.php";
?>
<html>
    <head>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    TaskName
                                </th>
                                <th>
                                    Created date
                                </th>
                                <th>
                                    Target date
                                </th>
                                <th>
                                    Complete date
                                </th>
                                <th>
                                    Change status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $c = 0; foreach ($tasks as $value) { ?>
                                <tr id="task_row_<?php echo $c; ?>">
                                    <td>
                                        <?php echo utf8_decode($value['task-name']) ?>
                                    </td>
                                    <td>
                                        <?php echo date('d.m.Y', strtotime($value['task-created'])) ?>
                                    </td>
                                    <td>
                                        <?php echo date('d.m.Y', strtotime($value['task-goal'])) ?>
                                    </td>
                                    <td>
                                        <?php echo (strlen($value['task-complete']) ? date('d.m.Y', strtotime($value['task-complete'])) : "<div class='alert alert-warning w-100' role='alert'>not complete</div>" ) ?>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-4 offset-1">
                                                <form method="POST">
                                                    
                                                    <?php if (strlen($value['task-complete'])) { ?>
                                                        <input type="hidden" name="task-status-continue" value="<?php echo $c; ?>">
                                                        <button type="submit" value="continue" class="btn btn-warning w-100">Continue</button>
                                                    <?php } else { ?>
                                                        <input type="hidden" name="task-status-complete" value="<?php echo $c; ?>">
                                                        <button type="submit" value="ready" class="btn btn-success w-100">Complete</button>
                                                    <?php } ?>
                                                </form>
                                            </div>
                                            <div class="col-4 offset-3">
                                                <form method="POST">
                                                    <input type="hidden" name="task-delete" value="<?php echo $c; ?>">
                                                    <button type="submit" value="delete" class="btn btn-danger w-100">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php $c++; } ?>        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container mt-5 create-container">
            <form method="POST">
                <div class="row">
                    <div class="col-sm">
                        <label for="task-name">Task name</label>
                        <input type="text" name="task-name" value="" class="form-control">
                    </div>
                    <div class="col-sm">
                        <label for="task-start">Task start date</label>
                        <input type="text" name="task-start" value="now" class="form-control datepicker">
                    </div>
                    <div class="col-sm">
                        <label for="task-goal">Task goal date</label>
                        <input type="text" name="task-goal" value="now" class="form-control datepicker">
                    </div>
                    <div class="col-sm">
                        <button id="saveNew" type="submit" value="save" class="btn btn-success w-100">Save</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="main.js"></script>
        
    </body>
</html>


