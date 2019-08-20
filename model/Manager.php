<?php
namespace Harmonie\Blog\Model;
class Manager {
  protected function dbConnect() {
    $db = new \PDO('mysql:host=localhost;dbname=blog_mvc;charset=utf8', 'root', '');
    return $db;
  }
}
