<?php
    
    require_once('app/init.php');

    $itemsQuery = $db->prepare("
        SELECT id,name,done
        FROM items
        WHERE user = :user
    ");

    $itemsQuery->execute(['user' => $_SESSION['user_id'] ]);

    $items = $itemsQuery->rowCount() ? $itemsQuery : [];

    foreach($items as $item)
    {
        //echo $item['name'], '<br>';
        echo print_r($item);
    }
     
?>

<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="UTF-8">
        <title>To do</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">  
        <link rel='stylesheet' href="css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <div class="list">

            <h1 class="header">To do.</h1>
            

            <ul class="items">
                <li>
                    <span class="item">pick up shopping</span>
                    <a href="#" class="done-button">mark as done</a>
                </li>
                <li>
                    <span class="item done">learn php</span>
                </li>

                <form action='add.php' method="post">
                <input type="text" name="name" placeholder="type here" class="input" autocomplete ="off" required >
                <input type="submit"  value="Add" class="submit">
                </form>
            </ul>

        </div>
    </body>
</html>