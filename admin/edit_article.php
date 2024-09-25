<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("../database.php");
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Trang ngoài</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="category.php">Thể loại</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="author.php">Tác giả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" href="article.php">Bài viết</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin Bài viết</h3>
                
                <?php
                $ma_bviet = '';
                $tieude = '';
                $ten_bhat = '';
                $ma_tloai = '';
                $tomtat = '';
                $ma_tgia = '';
                $ngayviet = '';

                if (isset($_GET['id'])) {
                    $id = mysqli_real_escape_string($conn, $_GET['id']); 
                    $query = "SELECT * FROM baiviet WHERE ma_bviet = '$id'";
                    $result = mysqli_query($conn, $query);
                    
                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $ma_bviet = $row['ma_bviet'];
                        $tieude = $row['tieude'];
                        $ten_bhat = $row['ten_bhat'];
                        $ma_tloai = $row['ma_tloai'];
                        $tomtat = $row['tomtat'];
                        $ma_tgia = $row['ma_tgia'];
                        $ngayviet = $row['ngayviet'];
                    }
                }
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ma_bviet"]) && isset($_POST["tieude"]) && isset($_POST["ten_bhat"]) && isset($_POST["ma_tloai"]) && isset($_POST["tomtat"]) && isset($_POST["ma_tgia"]) && isset($_POST["ngayviet"])) {
                    $ma_bviet = mysqli_real_escape_string($conn, $_POST['ma_bviet']);
                    $tieude = mysqli_real_escape_string($conn, $_POST['tieude']);
                    $ten_bhat = mysqli_real_escape_string($conn, $_POST['ten_bhat']);
                    $ma_tloai = mysqli_real_escape_string($conn, $_POST['ma_tloai']);
                    $tomtat = mysqli_real_escape_string($conn, $_POST['tomtat']);
                    $ma_tgia = mysqli_real_escape_string($conn, $_POST['ma_tgia']);
                    $ngayviet = mysqli_real_escape_string($conn, $_POST['ngayviet']);
                    $sql = "UPDATE baiviet 
                        SET tieude = '$tieude', 
                            ten_bhat = '$ten_bhat', 
                            ma_tloai = '$ma_tloai', 
                            tomtat = '$tomtat', 
                            ma_tgia = '$ma_tgia', 
                            ngayviet = '$ngayviet'
                        WHERE ma_bviet = '$ma_bviet'";
                    if (mysqli_query($conn, $sql)) {
                        header("Location: article.php");
                        exit();
                    } else {
                        echo "Error updating record: " . mysqli_error($conn);
                    }
                }
                ?>

                <!-- Display the form with existing data -->
                <form action="edit_article.php?id=<?php echo $ma_bviet; ?>" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblma_bviet">Mã Bài viết</span>
                        <input type="text" class="form-control" name="ma_bviet" value="<?php echo htmlspecialchars($ma_bviet); ?>" readonly>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lbltieude">Tiêu đề</span>
                        <input type="text" class="form-control" name="tieude" value="<?php echo htmlspecialchars($tieude); ?>" required>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblten_bhat">Tên bài hát</span>
                        <input type="text" class="form-control" name="ten_bhat" value="<?php echo htmlspecialchars($ten_bhat); ?>" required>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblma_tloai">Mã Thể loại</span>
                        <input type="text" class="form-control" name="ma_tloai" value="<?php echo htmlspecialchars($ma_tloai); ?>" required>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lbltomtat">Tóm tắt</span>
                        <input type="text" class="form-control" name="tomtat" value="<?php echo htmlspecialchars($tomtat); ?>" required>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblma_tgia">Mã Tác giả</span>
                        <input type="text" class="form-control" name="ma_tgia" value="<?php echo htmlspecialchars($ma_tgia); ?>" required>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblngayviet">Tóm tắt</span>
                        <input type="date" class="form-control" name="ngayviet" value="<?php echo htmlspecialchars($ngayviet); ?>" required>
                    </div>
                    <div class="form-group float-end">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="article.php" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>