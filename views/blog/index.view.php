<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi bloga ieraksti</title>
</head>
<body>
    <h1>Visi bloga ieraksti</h1>

    <button onclick="window.location.href='/create'">Izveidot jaunu ierakstu</button> <!-- Create Post Button -->

    <ul>
        <?php foreach ($posts as $post): ?>
            <li>
                <h2><?php echo htmlspecialchars($post['title']); ?></h2> <!-- Display the title -->
                <p><?php echo htmlspecialchars($post['content']); ?></p> <!-- Display the content -->
                <button onclick="window.location.href='/show/<?php echo $post['id']; ?>'">Skatīt</button> <!-- Show Button -->
                <button onclick="window.location.href='/edit/<?php echo $post['id']; ?>'">Rediģēt</button> <!-- Edit Button -->
                <button onclick="if(confirm('Are you sure you want to delete this post?')) window.location.href='/delete/<?php echo $post['id']; ?>'">Dzēst</button> <!-- Delete Button -->
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
