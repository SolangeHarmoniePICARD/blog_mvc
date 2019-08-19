<?php
namespace Harmonie\Blog\Model;
class Manager {
  protected function dbConnect() {
    $db = new \PDO('mysql:*****;dbname=*****;charset=utf8', '*****', '*****');
    return $db;
  }
}
