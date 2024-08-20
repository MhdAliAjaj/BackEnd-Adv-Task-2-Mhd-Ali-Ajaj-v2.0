<?php
require_once '../Classes/Post.php';

if (isset($_GET['id'])) {
    $post = new Post();
    $data = $post->read($_GET['id']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $post->id = $_GET['id'];
        $post->title = $_POST['title'];
        $post->content = $_POST['content'];
        $post->author = $_POST['author'];

        if ($post->update()) {
            echo "Post updated successfully!";
        } else {
            echo "Failed to update post.";
        }
    }
    ?>
    <form method="POST" action="">
        <input type="text" name="title" value="<?php echo htmlspecialchars($data['title']); ?>" required><br>
        <textarea name="content" required><?php echo htmlspecialchars($data['content']); ?></textarea><br>
        <input type="text" name="author" value="<?php echo htmlspecialchars($data['author']); ?>" required><br>
        <input type="submit" value="Update Post">
    </form>
    <?php
} else {
    echo "No post ID provided.";
}
?>
