<?php
include("../database.php");
$query = "SELECT * FROM theloai";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life - Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="./">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="../index.php">Website</a></li>
                        <li class="nav-item"><a class="nav-link active fw-bold" href="category.php">Categories</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Categories</h3>
                <a href="add_category.php" class="btn btn-success mb-3">Thêm thể loại</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên thể loại</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)){
                                echo '<tr><th scope="row">'.$row["ma_tloai"].'</th><td>'.$row["ten_tloai"].'</td><td><a href="edit_category.php?id=' . $row["ma_tloai"] . '"><i class="fa-solid fa-pen-to-square"></i></a></td><td><a href="category.php?id='.$row['ma_tloai'].'" ><i class="fa-solid fa-trash"></i></a></td></tr>';

                                if (isset($_GET['this_id'])) {
                                    $this_id = $_GET['this_id'];
                                    $sql = "DELETE FROM theloai WHERE ma_tloai = '$this_id'";
                                    if (mysqli_query($conn, $sql)) {
                                        // Redirect after deletion
                                        header("Location: http://localhost/btth01/admin/category.php");
                                        exit();
                                    }
                                }
                            }
                        } else {
                            echo "<tr><td colspan='4'>No categories found</td></tr>";
                        }
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
mysqli_free_result($result);
mysqli_close($conn);
?>
