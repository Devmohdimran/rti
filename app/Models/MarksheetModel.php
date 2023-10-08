<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarksheetModel extends Model
{
    use HasFactory;
    protected $table = 'marksheet';
    protected $primaryKey = 'id';
}
