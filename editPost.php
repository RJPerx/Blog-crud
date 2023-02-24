<?php
include('./data.php');
$connect = dataConnect();

$sql = "SELECT * FROM blog WHERE id = $_GET[blogId]";
$query = mysqli_query($connect, $sql);

$blog = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container col-md-6 py-5 mt-5">
        <div class='card my-2'>
            <div class='card-header d-flex justify-content-between'>
            <h5 class="card-title">Edit Post</h5>
                
                
            </div>
            <div class='card-body'>
                <p class='card-text'>
                <form action="./addPost.php?method=edit" method="POST">
                    <input type="hidden" name="blogId" value="<?php echo $blog['id']?>">
                    <input type="text" name="edit_title" placeholder="Your Title..." class="form-control mb-2" value="<?php echo $blog['title']?>" required>
                    <textarea name="edit_content" class="form-control mb-2" cols="30" rows="5" placeholder="Type your text here..."><?php echo $blog['content'] ?></textarea>
                    <div class="col-md-6">
                        <div class="btn-group w-100" role="group">
                            <button type="submit" class="btn btn-primary w-100">UPDATE</button>
                            <a type="button" href="./" class="btn btn-danger w-100">CANCEL</a>
                        </div>
                    </div>
                    
                </form>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>