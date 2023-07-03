<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
  protected $table = 'comment';
  protected $primaryKey = 'comment_id';
  protected $useAutoIncrement = true;
  protected $useTimestamps = true;

  protected $allowedFields = ['comment', 'user_id', 'tutorial_id', 'updated_at', 'created_at'];

}