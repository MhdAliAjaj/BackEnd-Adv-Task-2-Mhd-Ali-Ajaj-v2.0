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
<?php
require_once '../Classes/Post.php';

if (isset($_GET['id'])) {
    $post = new Post();
    $data = $post->read($_GET['id']);
    if ($data) {
        echo '<div class="card mb-4">';
        echo '<div class="card-header"><h2>' . htmlspecialchars($data['title']) . '</h2></div>';
        echo '<div class="card-body">';
        echo '<p class="card-text">' . nl2br(htmlspecialchars($data['content'])) . '</p>';
        echo '</div>';
        echo '<div class="card-footer text-muted"><i>By: ' . htmlspecialchars($data['author']) . '</i></div>';
        echo '</div>';
    } else {
        echo '<div class="alert alert-warning">Post not found.</div>';
    }
} else {
    echo '<div class="alert alert-danger">No post ID provided.</div>';
}
?>

</body>
</html>
