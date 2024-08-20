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

$post = new Post();
$posts = $post->listAll();

echo '<h2>All Posts</h2>';
echo '<table class="table table-striped">';
echo '<thead>';
echo '<tr>';
echo '<th>Title</th>';
echo '<th>Author</th>';
echo '<th>Actions</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach ($posts as $post) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($post['title']) . '</td>';
    echo '<td>' . htmlspecialchars($post['author']) . '</td>';
    echo '<td>';
    echo '<a href="view_post.php?id=' . $post['id'] . '" class="btn btn-info btn-sm">Read</a> ';
    echo '<a href="edit_post.php?id=' . $post['id'] . '" class="btn btn-warning btn-sm">Edit</a> ';
    echo '<a href="delete_post.php?id=' . $post['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\');">Delete</a>';
    echo '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';
?>
    </div>
    </body>
    </html>
