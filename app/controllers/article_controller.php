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
            }
        }

        public function ArticleAdd(){
            $conn = ConnectToDatabase();
            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["txtTitle"]) && isset($_POST["txtSongName"])&& isset($_POST["txtCatName"])&& isset($_POST["txtAuthName"])&& isset($_POST["Summary"])&& isset($_POST["Content"])&& isset($_POST["dateOfwriting"])&& isset($_POST["songIMG"])){
                $tloai = true;
                $tgia = true;
                while($tloai == true && $tgia == true){
                    $tloai = Article::checkTloai($conn, $_POST["txtCatName"]);
                    $tgia = Article::checkTgia($conn, ($_POST["txtAuthName"]));
                    if($tloai){
                        Category::addCategory($conn, $_POST["txtCatName"]);
                    }
                    if($tgia){
                        Author::addAuthor($conn, $_POST["txtAuthName"]);
                    }
                    if($tloai == false && $tgia == false){
                        Article::addArticle($conn, $_POST["txtTitle"], $_POST["txtSongName"], $_POST["txtCatName"], $_POST["txtAuthName"], $_POST["Summary"], $_POST["Content"], $_POST["dateOfwriting"], $_GET["songIMG"]);
                    }
                }
            }
        }


    }
?>