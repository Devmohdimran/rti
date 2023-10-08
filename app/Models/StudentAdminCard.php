<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAdminCard extends Model
{
    use HasFactory;
    protected $table = 'admin_card';

    public function stuAdminWithStudent()
    {
        return $this->hasMany(StudentModel::class,  'reg', 'stu_reg_no');
    }
}
