<?php

    include("model/connexion.php"); 

    function getPosts(){
        $db = dbConnect();
        $reponse = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS date FROM posts LIMIT 0, 5'); 
        return $reponse ;
    }
    
    function getPost($postId)
    {
        $db = dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
    
        return $post;
    }

    function getComments($postId)
    {
        $db = dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date_fr DESC');
        $comments->execute(array($postId));
        return $comments;
    }

?>