<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentIcard extends Model
{
    use HasFactory;
    protected $table = 'stu_icard';
    public function stuicardwithadmission()
    {
        return $this->hasMany(StudentModel::class,  'reg', 'stud_reg_no');
    }
}
