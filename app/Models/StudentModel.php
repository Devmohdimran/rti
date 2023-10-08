<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;
    protected $table = 'admission';

    public function stuFeesManageWithStudent()
    {
        return $this->hasMany(FeesSubmissonModel::class, 'reg', 'reg');
    }
}
