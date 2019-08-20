<?php

namespace Harmonie\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager {

  public function getComments($postId) {
    $db = $this->dbConnect();
    $comments = $db->prepare("SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC");
    $comments->execute(array($postId));
    return $comments;
  }

  public function postComment($postId, $author, $comment){
    $db = $this->dbConnect();
    $request = $db->prepare("INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())");
    $commentAdded = $request->execute(array($postId, $author, $comment));
    return $commentAdded;
  }

  public function getComment($id) {
    $db = $this->dbConnect();
    $request = $db->prepare("SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date_fr FROM comments WHERE id = ?");
    $request->execute(array($id));
    $comment = $request->fetch();
    return $comment;
  }

  public function updateComment($id, $comment) {
    $db = $this->dbConnect();
    $request = $db->prepare('UPDATE comments SET comment = ?, comment_date = NOW() WHERE id = ?');
    $newComment = $request->execute(array($comment, $id));
    return $newComment;
  }

}
