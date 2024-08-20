


<?php
require_once '../Classes/Post.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post = new Post();
    $post->title = $_POST['title'];
    $post->content = $_POST['content'];
    $post->author = $_POST['author'];

    if ($post->create()) {
        echo '<div class="alert alert-success">Post created successfully!</div>';
         header("location:list_posts.php");
    } else {
        echo '<div class="alert alert-danger">Failed to create post.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4"></div>

<h2>Create a New Post</h2>
<form method="POST" action="">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter the title" required>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content" rows="5" placeholder="Enter the content" required></textarea>
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" id="author" name="author" placeholder="Enter the author name" required>
    </div>
    <button type="submit" class="btn btn-primary">Create Post</button>
</form>
</body>
</html>