<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
  protected $table = 'comment';
  protected $primaryKey = 'comment_id';
  protected $useAutoIncrement = true;
  protected $useTimestamps = true;

  protected $allowedFields = ['comment', 'user_id', 'tutorial_id', 'updated_at', 'created_at', 'parent_id'];

  public function deleteComment($id, $userId)
  {
    $db = db_connect();
    $db->transBegin();
    $sql = "delete from comment where comment_id=? and user_id=?";
    $db->query($sql, [$id, $userId]);
    $sql2 = "delete from comment where parent_id=?";
    $db->query($sql2, [$id]);
    $db->transComplete();
    return $db->transStatus();
  }

  public function rowCount()
  {
    $db = db_connect();
    $sql = "select count(*) as count from comment where parent_id=0";
    $stmt = $db->query($sql);
    return $stmt->getRowArray();
  }

  public function getTop5()
  {
    $db = db_connect();
    $sql = "select
          c.comment,
          u.nama,
          u.image,
          c.updated_at
        from
          comment c
        inner join `user` u on
          (c.user_id = u.user_id)
        where c.parent_id = 0
        order by
          c.updated_at desc
        limit 5;";
    $stmt = $db->query($sql);
    return $stmt->getResultArray();
  }

}