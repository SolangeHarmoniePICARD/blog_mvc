<?php $title = 'Modifier un commentaire' ?>
<?php ob_start(); ?>
<h1>Modifier un commentaire</h1>
<p><a href="index.php">Retour au blog</a></p>
<form action="index.php?action=editComment&amp;id=<?= $comment['id'] ?>" method="post">
  <div>
    <p>Auteur : <?= $comment['author'] ?></p>
    <label for="comment">Commentaire</label><br>
    <textarea id="comment" name="comment"><?= $comment['comment'] ?></textarea>
  </div>
  <div>
    <input type="submit" value="Modifier" onclick="showSuccessMessage()">
  </div>
</form>
<script src="public/js/success.js" type="text/javascript"></script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
