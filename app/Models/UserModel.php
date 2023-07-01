<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table = 'user';
  protected $primaryKey = 'user_id';
  protected $useAutoIncrement = true;
  protected $useTimestamps = true;

  //protected $allowedFields = ['nama', 'email', 'password','is_admin','activated_at','active','created_at'];

}