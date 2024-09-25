<?php
    require_once '../models/article.php';
    require_once '../../config/database.php';

    class ArticleController {
        public function showArticleDetail($songName) {
            $conn = ConnectToDatabase();
            $result = Article::getArticleBySongName($conn, $songName);
            return $result;
        }
    }
?>