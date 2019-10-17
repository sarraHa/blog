<?php

    // Chargement des classes
    require_once('model/frontend/PostManager.php');
    require_once('model/frontend/CommentManager.php');

    use \sara\Blog\Model\frontend\PostManager;
    use \sara\Blog\Model\frontend\CommentManager;

    function listPosts()
    {
        $postManager = new PostManager(); // Création d'un objet
        $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

        require('view/frontend/listPostsView.php');
    }

    function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        
        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('view/frontend/postView.php');
    }

    function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();

        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');    
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    function updateCommentView($postId, $idComment, $comment)
    {
        
        require('view/frontend/updateCommentView.php');
        
    }

    function updateComment($postId, $idComment, $comment)
    {
        $commentManager = new CommentManager();

        $affectedLines = $commentManager->updateComment($idComment, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible de mofidier le commentaire !');    
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }

    }

