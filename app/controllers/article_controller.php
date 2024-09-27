<?php
    require_once __DIR__ . '/../models/article.php';
    require_once __DIR__ . '/../models/category.php';
    require_once __DIR__ . '/../models/author.php';
    include(__DIR__ . '/../../config/database.php');

    class ArticleController {
        public function showArticleDetail($songName) {
            $conn = ConnectToDatabase();
            $result = Article::getArticleBySongName($conn, $songName);
            return $result;
        }

        public function ArticleList(){
            $conn = ConnectToDatabase();
            $result = Article::getArticleList($conn);
            return $result;
        }

        public function ArticleDel(){
            $conn = ConnectToDatabase();
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                Article::deleteArticle($conn, $id);
                unset($_GET['id']);
                header('Location: ./article_view.php');
                exit;
            }
        }

        public function ArticleAdd(){
            $conn = ConnectToDatabase();
            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["txtTitle"]) && isset($_POST["txtSongName"])&& isset($_POST["txtCatName"])&& isset($_POST["txtAuthName"])&& isset($_POST["Summary"])&& isset($_POST["Content"])&& isset($_POST["dateOfwriting"])&& isset($_POST["songIMG"])){
                $resulttloai = Category::checkTloai($conn, $_POST['txtCatName']);
                $tloai = $resulttloai->fetch_assoc();

                $resulttgia = Author::checkTgia($conn, $_POST['txtAuthName']);
                $tgia =  $resulttgia->fetch_assoc();

                    if($tloai['is_exists'] == 0)
                        Category::addCategory($conn, $_POST['txtCatName']);
                    if($tgia['is_exists'] == 0)
                        Author::addAuthor($conn, $_POST['txtAuthName']);
                
                $id_tloai = Category::getCategoryID($conn, $_POST['txtCatName']);
                $id_tgia = Author::getAuthorID($conn, $_POST['txtAuthName']);
                Article::addArticle($conn, $_POST["txtTitle"], $_POST["txtSongName"], $id_tloai, $_POST["Summary"], $_POST["Content"], $id_tgia, $_POST["dateOfwriting"], $_POST['sonngIMG']);
                header("Location: ./article_view.php");
                exit;
            }
        }

        
        public function ArticleDetail(){
            $conn = ConnectToDatabase();
            if(isset($_GET['id'])){
                $result = Article::getArticleDetail($conn, $_GET['id']);
                return $result->fetch_assoc();
            }
        }

        public function ArticleEdit(){
            $conn = ConnectToDatabase();

            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['txtTitle']) && isset($_POST["txtSongName"]) && isset($_POST["txtCatName"])&& isset($_POST["txtAuthName"])&& isset($_POST["Summary"])&& isset($_POST["Content"])&& isset($_POST["dateOfwriting"])&& isset($_POST["hinhanh"])){

                $ma_bviet = mysqli_real_escape_string($conn,$_POST['txtArtcleID']);
                $tieude = mysqli_real_escape_string($conn,$_POST['txtTitle']);
                $ten_bhat = mysqli_real_escape_string($conn, $_POST['txtSongName']);
                $tomtat = mysqli_real_escape_string($conn, $_POST['Summary']);
                $noidung = mysqli_real_escape_string($conn, $_POST['Content']);
                $ngayviet = mysqli_real_escape_string($conn, $_POST['dateOfwriting']);
                $hinhanh = mysqli_real_escape_string($conn, $_POST['hinhanh']);

                $resulttloai = Category::checkTloai($conn, $_POST['txtCatName']);
                $tloai = $resulttloai->fetch_assoc();
  
                $resulttgia = Author::checkTgia($conn, $_POST['txtAuthName']);
                $tgia =  $resulttgia->fetch_assoc();

                if($tloai['is_exists'] == 0)
                    Category::addCategory($conn, $_POST['txtCatName']);
                if($tgia['is_exists'] == 0)
                    Author::addAuthor($conn, $_POST['txtAuthName']);

                $id_tloai = Category::getCategoryID($conn, $_POST['txtCatName']);
                $id_tgia = Author::getAuthorID($conn, $_POST['txtAuthName']);

                Article::updateArticle($conn, $ma_bviet, $tieude, $ten_bhat, $id_tloai, $tomtat, $noidung, $id_tgia, $ngayviet, $hinhanh);

                header("Location: ./article_view.php");
            }
        }
    }
?>