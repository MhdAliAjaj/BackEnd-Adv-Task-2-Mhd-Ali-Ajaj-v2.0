<?php
require_once '../Classes/Post.php';

if (isset($_GET['id'])) {
    $post = new Post();
    $data = $post->read($_GET['id']);
    if ($data) {
        echo "<h1>" . htmlspecialchars($data['title']) . "</h1>";
        echo "<p>" . htmlspecialchars($data['content']) . "</p>";
        echo "<p><i>By: " . htmlspecialchars($data['author']) . "</i></p>";
    } else {
        echo "Post not found.";
    }
} else {
    echo "No post ID provided.";
}
?>
