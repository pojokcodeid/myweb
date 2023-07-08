<?php

namespace App\Models;

use CodeIgniter\Model;

class LikeModel extends Model
{
  protected $table = 'like_dislike';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $useTimestamps = true;

  protected $allowedFields = ['likests', 'dislike', 'comment_id', 'user_id'];

  public function getLikeCount($comment_id)
  {
    $db = db_connect();
    $query = "select sum(ifnull(likests,0)) as like_count,
     sum(ifnull(dislike,0)) as dislike_count 
     from like_dislike where comment_id = ?";
    $stmt = $db->query($query, [$comment_id]);
    return $stmt->getRowArray();
  }

  public function isLikeDislike($comment_id, $user_id)
  {
    $db = db_connect();
    $query = "select likests,dislike from like_dislike where comment_id = ? and user_id = ?";
    $stmt = $db->query($query, [$comment_id, $user_id]);
    return $stmt->getResultArray();
  }

  public function deleteLike($comment_id, $user_id)
  {
    $db = db_connect();
    $query = "delete from like_dislike where comment_id = ? and user_id = ? and likests=1";
    $stmt = $db->query($query, [$comment_id, $user_id]);
    return $stmt;
  }


  public function deleteDislike($comment_id, $user_id)
  {
    $db = db_connect();
    $query = "delete from like_dislike where comment_id = ? and user_id = ? and dislike=1";
    $stmt = $db->query($query, [$comment_id, $user_id]);
    return $stmt;
  }

  public function getLikeExists($comment_id, $user_id)
  {
    $db = db_connect();
    $query = "select * from like_dislike where comment_id = ? and user_id = ? and likests=1";
    $stmt = $db->query($query, [$comment_id, $user_id]);
    return $stmt->getRowArray();
  }

  public function getDislikeExists($comment_id, $user_id)
  {
    $db = db_connect();
    $query = "select * from like_dislike where comment_id = ? and user_id = ? and dislike=1";
    $stmt = $db->query($query, [$comment_id, $user_id]);
    return $stmt->getRowArray();
  }

}