<?php

namespace App\Models;

use CodeIgniter\Model;

class TutorialModel extends Model
{
  protected $table = 'tutorial';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $useTimestamps = true;

  public function getCommentLimit($id, $limit)
  {
    $db = db_connect();
    $query = "
    select * from 
    (select 
      u.user_id,c.comment_id,c.comment,
      c.created_at, u.nama, u.image
    from comment c inner join `user` u on(c.user_id=u.user_id)
    where c.tutorial_id = ?
      and c.parent_id = 0
      order by c.created_at desc
      limit ?) as a order by a.created_at asc;";
    $stmt = $db->query($query, [$id, $limit]);
    return $stmt->getResultArray();
  }

  public function getCommentById($id, $limit = 5)
  {
    $db = db_connect();
    $query = "
    select 
      u.user_id,c.comment_id,c.comment,c.tutorial_id,
      c.created_at, u.nama, u.image, c.parent_id
    from comment c inner join `user` u on(c.user_id=u.user_id)
    where c.comment_id = ?
      and c.parent_id = 0
      order by c.created_at desc
      limit ?";
    $stmt = $db->query($query, [$id, $limit]);
    return $stmt->getRowArray();
  }

  public function getParent($id)
  {
    $db = db_connect();
    $query = "
    select 
      u.user_id,c.comment_id,c.comment,c.parent_id,
      c.created_at, u.nama, u.image
    from comment c inner join `user` u on(c.user_id=u.user_id)
    where c.parent_id = ?
      order by c.created_at asc;";
    $stmt = $db->query($query, [$id]);
    return $stmt->getResultArray();
  }

  public function getParentInert($id)
  {
    $db = db_connect();
    $query = "
    select 
      u.user_id,c.comment_id,c.comment,c.parent_id,
      c.created_at, u.nama, u.image
    from comment c inner join `user` u on(c.user_id=u.user_id)
    where c.comment_id = ?
      order by c.created_at asc;";
    $stmt = $db->query($query, [$id]);
    return $stmt->getRowArray();
  }

}