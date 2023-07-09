<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
  protected $table = 'log';
  protected $primaryKey = 'log_id';
  protected $useAutoIncrement = true;
  protected $useTimestamps = true;

  protected $allowedFields = ['log_type', 'tutorial_id'];

}