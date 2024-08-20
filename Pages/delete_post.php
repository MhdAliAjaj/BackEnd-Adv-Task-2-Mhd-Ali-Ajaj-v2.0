<?php
require_once '../Classes/Post.php';

if (isset($_GET['id'])) {
    $post = new Post();
    $post->id = $_GET['id'];

    if ($post->delete()) {
        echo "Post deleted successfully!";
    } else {
        echo "Failed to delete post.";
    }
} else {
    echo "No post ID provided.";
}
?>
