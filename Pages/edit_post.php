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
            echo '<div class="alert alert-success">Post updated successfully!</div>';
            header("location:list_posts.php");
        } else {
            echo '<div class="alert alert-danger">Failed to update post.</div>';
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
    <div class="container mt-4">

    <h2>Edit Post</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($data['title']); ?>" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required><?php echo htmlspecialchars($data['content']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="<?php echo htmlspecialchars($data['author']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
    <?php
} else {
    echo '<div class="alert alert-danger">No post ID provided.</div>';
}
?>
    
</body>
</html>

