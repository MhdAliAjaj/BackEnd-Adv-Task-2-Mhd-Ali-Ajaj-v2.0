<?php
require './../Classes/Post.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post = new Post();
    $post->title = $_POST['title'];
    $post->content = $_POST['content'];
    $post->author = $_POST['author'];

    if ($post->create()) {
        echo "Post created successfully!";
    } else {
        echo "Failed to create post.";
    }
}
?>

<form method="POST" action="">
    <input type="text" name="title" placeholder="Title" required><br>
    <textarea name="content" placeholder="Content" required></textarea><br>
    <input type="text" name="author" placeholder="Author" required><br>
    <input type="submit" value="Create Post">
</form>
