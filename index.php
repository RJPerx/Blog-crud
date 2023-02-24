<?php
include('./data.php');
$connect = dataConnect();

$sql = "SELECT * FROM blog ORDER BY id DESC";
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    
    <div class="container col-md-6 justify-content-center">
        <div class="card text-center mx-auto mt-5">
            <div class="card-body">
                <h3 class="card-title">Add Post</h3>
                <form action="./addPost.php?method=add" method="post">
                    <input type="text" name="title" placeholder="Your Title..." class="form-control mb-2" required>
                    <textarea name="content" class="form-control mb-2" cols="30" rows="5" placeholder="Type your text here.."></textarea>
                        <div class="col-md-4 ">
                            <button type="submit" class="btn btn-primary w-100">POST</button>
                        </div>
                </form>
            </div>

        </div>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo
                "   <div class='card my-5'>
                        <div class='card-header d-flex justify-content-between'>
                            <span>$row[title] <i>($row[date_created])</i></span>
                            <div>
                                <a id='$row[id]' href='./editPost.php?blogId=$row[id]' class='mx-2 text-primary edit'>
                                    <i class='bi bi-pencil-square'></i>
                                </a>
                                <a id='$row[id]' href='./addPost.php?method=delete&blogId=$row[id]' class='text-danger delete'>
                                    <i class='bi bi-trash3'></i>
                                </a>
                            </div>
                            
                        </div>
                        <div class='card-body'>
                            <p class='card-text'>$row[content]</p>
                        </div>
                    </div>";
            }
        } else {
            echo "
                    <div class='card text-center'>
                    <div class='card-header'>
                    No blog posted
                    </div>
                </div>
                ";
        }
        ?>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>