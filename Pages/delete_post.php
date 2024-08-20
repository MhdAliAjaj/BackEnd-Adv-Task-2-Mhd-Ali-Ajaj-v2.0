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
    <div class="container mt-4">

<?php
require_once '../Classes/Post.php';

if (isset($_GET['id'])) {
    $post = new Post();
    $post->id = $_GET['id'];

    if ($post->delete()) {
        echo '<div class="alert alert-success">Post deleted successfully!</div>';
        header("location:list_posts.php");
    } else {
        echo '<div class="alert alert-danger">Failed to delete post.</div>';
    }
} else {
    echo '<div class="alert alert-warning">No post ID provided.</div>';
}
?>
    </div>
    </body>
</html>