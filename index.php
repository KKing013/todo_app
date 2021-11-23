<?php

$todos = [];

if (file_exists('todo.json')) {
    $json = file_get_contents('todo.json');
    $todos = json_decode($json, true);
}

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <script src="" async defer></script>

    <form action="newtodo.php" method="POST">
        <input class="" type="text" name="todo_name" placeholder="Enter your todo">
        <button class="btn btn-outline-primary">New Todo</button>
    </form>
    <br>

    <?php foreach ($todos as $todoName => $todo) : ?>

        <div style="margin-bottom: 20px;">
            <form style="display: inline-block;" action="change_status.php" method="POST">
                <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                <input type="checkbox" <?php echo $todo['completed'] ? 'checked' : '' ?>>
            </form>

            <?php echo $todoName ?>

            <form style="display: inline-block;" action="delete.php" method="POST">
                <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                <button class="btn btn-outline-danger btn-sm">Delete</button>
            </form>

        </div>
    <?php endforeach; ?>

    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox]');
        checkboxes.forEach(ch => {
            ch.onclick = function() {
                this.parentNode.submit();
            };
        })
    </script>

</body>

</html>