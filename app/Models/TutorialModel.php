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
    select 
      u.user_id,c.comment_id,c.comment,
      c.created_at, u.nama, u.image
    from comment c inner join `user` u on(c.user_id=u.user_id)
    where c.tutorial_id = ?
      and c.parent_id = 0
      order by c.created_at desc
      limit ?;";
    $stmt = $db->query($query, [$id, $limit]);
    return $stmt->getResultArray();
  }

  public function getParent($id)
  {
    $db = db_connect();
    $query = "
    select 
      u.user_id,c.comment_id,c.comment,
      c.created_at, u.nama, u.image
    from comment c inner join `user` u on(c.user_id=u.user_id)
    where c.parent_id = ?
      order by c.created_at asc;";
    $stmt = $db->query($query, [$id]);
    return $stmt->getResultArray();
  }

}