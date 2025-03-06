<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Blog Post</title>
</head>
<body>
    <h1>Create a New Blog Post</h1>
    <form action="/create" method="POST"> <!-- POST to /create -->
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" required></textarea><br><br>
        
        <button type="submit">Create Post</button>
    </form>
    <a href="/">Back to all posts</a>
</body>
</html>
