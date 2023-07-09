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

  public function topTutorial()
  {
    $db = db_connect();
    $sql = "select
        distinct k.slug,
        k.id,
        k.nama
      from
        log l
      inner join tutorial t on
        (l.tutorial_id = t.id)
      inner join kategori k on
        (k.id = t.kategoriid)
      where
        l.log_type = 'view'
      order by
        l.created_at desc
      limit 10";
    $stmt = $db->query($sql);
    return $stmt->getResultArray();
  }

}