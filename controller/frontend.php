<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

use \Harmonie\Blog\Model\PostManager;
use \Harmonie\Blog\Model\CommentManager;

function listPosts(){
  $postManager = new PostManager();
  $posts = $postManager->getPosts();
  require('view/frontend/listPostsView.php');
}

function post(){
  $postManager = new PostManager();
  $commentManager = new CommentManager();
  $post = $postManager->getPost($_GET['id']);
  $comments = $commentManager->getComments($_GET['id']);
  require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment){
  $commentManager = new CommentManager();
  $commentAdded = $commentManager->postComment($postId, $author, $comment);
  if ($commentAdded === false) {
    throw new Exception('Impossible d\'ajouter le commentaire !');
  }
  else {
    header('Location: index.php?action=post&id=' . $postId);
  }
}

function viewComment(){
  $commentManager = new CommentManager();
  $comment = $commentManager->getComment($_GET['id']);
  require('view/frontend/editCommentView.php');
}


function editComment($id, $comment) {
  $commentManager = new CommentManager();
  $newComment = $commentManager->updateComment($id, $comment);
  if ($newComment === false) {
    throw new Exception('Impossible de modifier le commentaire !');
  } else {
    header('Location: index.php');
  }
}
