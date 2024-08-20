<?php
require_once '../Classes/Post.php';

$post = new Post();
$posts = $post->listAll();

foreach ($posts as $post) {
    echo "<h2>" . htmlspecialchars($post['title']) . "</h2>";
    echo "<p>" . htmlspecialchars(substr($post['content'], 0, 100)) . "...</p>";
    echo "<p><i>By: " . htmlspecialchars($post['author']) . "</i></p>";
    echo "<a href='view_post.php?id=" . $post['id'] . "'>Read more</a> | ";
    echo "<a href='edit_post.php?id=" . $post['id'] . "'>Edit</a> | ";
    echo "<a href='delete_post.php?id=" . $post['id'] . "' onclick='return confirm(\"Are you sure?\");'>Delete</a>";
    echo "<hr>";
}
?>
