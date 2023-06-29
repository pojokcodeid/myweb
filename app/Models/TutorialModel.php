<?php

namespace App\Models;

use CodeIgniter\Model;

class TutorialModel extends Model
{
  protected $table = 'tutorial';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $useTimestamps = true;

}