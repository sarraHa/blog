<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>	    

<h1>Mon super blog !</h1>   

<div id="corps">
	<h1>Derniers billets du blog :</h1>
	<?php
		while ($data = $posts->fetch())
		{
	?>
	<h3>
		<?= htmlspecialchars($data['title']) ?>
		<em>le <?= htmlspecialchars($data['date']) ?></em>
	</h3>
	<p><?php echo nl2br(htmlspecialchars($data['content'])) ; ?> </p>		
	<?php echo "<a href=\"index.php?action=post&amp;id=".$data['id']."\">Commentaires </a>" ?> 

	<?php 
		}
		$posts->closeCursor();
	?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>