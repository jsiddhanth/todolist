<?php

require_once('app/init.php');

$itemsQuery = $db->prepare("SELECT id,name,done FROM items WHERE user = :user ");

$itemsQuery->execute(['user' => $_SESSION['user_id']]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico&display=swap">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>

<body>
    <div class="list">
        <div class="header">To do.</div>

        <!-- --------------------- check if list is empty --------------------- --> 
        <?php if(!empty($items)): ?>
        <ul class="items">
            <!-- --------------------- display tolist items --------------------- -->
            <?php foreach($items  as $item): ?>
            <li class="item">
                <span class="item <?php echo $item['done'] ? 'done' : '' ?>"><?php echo $item['name']; ?></span>
                <?php if($item['done'] == 0): ?>
                <a href=mark.php?as=done&item=<?php echo $item['id']; ?>" class="done-button">mark as done</a>
                <?php elseif($item['done'] == 1): ?>
                <a href="mark.php?as=not&item=<?php echo $item['id']; ?>" class="done-button">not done</a>
                <?php endif; ?>
                <a href="delete.php?id=<?php echo $item['id']; ?>" class="delete-button">DELETE</a>
            </li>      
            <?php endforeach; ?>
        </ul>
        <?php else: ?>
            <p> no item to display</p>
        <?php endif; ?>

        <form action="add.php" method="post">
            <input type="text" name="name" class="input" placeholder="type here">
            <input type="submit" value="add" class="submit">
        </form>    
    </div>
</body>
</html>