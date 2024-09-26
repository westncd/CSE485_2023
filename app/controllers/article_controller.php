<?php
    require_once __DIR__ . '/../models/article.php';
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
    }
?>