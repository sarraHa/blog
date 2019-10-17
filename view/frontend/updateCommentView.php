<?php $title = "Modifiez le commentaire"; ?>
<?php ob_start(); ?>	   


<div class="addComment">
    <h4>Modifiez le commentaire</h4>
    <form action="index.php?action=updateComment&amp;idComment=<?= $_GET['idComment'] ?>&amp;postId=<?= $_GET['postId'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" value=<?= $_GET['author'] ?> />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>