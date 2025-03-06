<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog Post</title>
</head>
<body>
    <h1>Edit Blog Post</h1>
    <form action="/update/<?php echo $post['id']; ?>" method="POST">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required><br><br>
        
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" required><?php echo htmlspecialchars($post['content']); ?></textarea><br><br>
        
        <button type="submit">Update Post</button>
    </form>
    <a href="/">Back to all posts</a>
</body>
</html>