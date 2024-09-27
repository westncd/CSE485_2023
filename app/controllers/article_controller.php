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

                while($tloai['is_exists'] == 0 || $tgia['is_exists'] == 0){
                    if($tloai['is_exists'] == 0)
                        Category::addCategory($conn, $_POST['txtCatName']);
                    if($tgia['is_exists'] == 0)
                        Author::addAuthor($conn, $_POST['txtAuthName']);
                }
                
                $id_tloai = Category::getCategoryID($conn, $_POST['txtCatName']);
                $id_tgia = Author::getAuthorID($conn, $_POST['txtAuthName']);
                Article::addArticle($conn, $_POST["txtTitle"], $_POST["txtSongName"], $id_tloai, $_POST["Summary"], $_POST["Content"], $id_tgia, $_POST["dateOfwriting"], $_POST['sonngIMG']);
                header("Location: ./article_view.php");
                exit;
            }
        }

        public function ArticleUpdate($tieude, $ten_bhat, $tomtat, $noidung, $ngayviet, $hinhanh){
            $conn = ConnectToDatabase();
            
            if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET["txtTitle"]) && isset($_GET["txtSongName"])&& isset($_GET["txtCatName"])&& isset($_GET["txtAuthName"])&& isset($_GET["Summary"])&& isset($_GET["Content"])&& isset($_GET["dateOfwriting"])&& isset($_GET["songIMG"])){
                $resulttloai = Category::checkTloai($conn, $_GET['txtCatName']);
                $tloai = $resulttloai->fetch_assoc();

                $resulttgia = Author::checkTgia($conn, $_GET['txtAuthName']);
                $tgia =  $resulttgia->fetch_assoc();

                while($tloai['is_exists'] == 0 || $tgia['is_exists'] == 0){
                    if($tloai['is_exists'] == 0)
                        Category::addCategory($conn, $_GET['txtCatName']);
                    if($tgia['is_exists'] == 0)
                        Author::addAuthor($conn, $_GET['txtAuthName']);
                }

                $id_tloai = Category::getCategoryID($conn, $_GET['txtCatName']);
                $id_tgia = Author::getAuthorID($conn, $_GET['txtAuthName']);

                Article::updateArticle($conn, $_GET['id'], $tieude, $ten_bhat, $id_tloai, $tomtat, $noidung, $id_tgia, $ngayviet, $hinhanh);

                header("Location: https://www.youtube.com/watch?v=F8lB-sR5bX0");
                exit;
            }
        }

        public function ArticleDetail(){
            $conn = ConnectToDatabase();
            if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])){
                $result = Article::getArticleDetail($conn, $_GET['id']);
                return $result->fetch_assoc();
            }
        }

    }
?>