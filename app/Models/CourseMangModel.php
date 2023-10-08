<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMangModel extends Model
{
    use HasFactory;
    protected $table = 'course';
    protected $fillable = ['course_name', 'course_fee', 'course_duration'];

    public function courseSubjects()
    {
        return $this->hasMany(CourseSubjectModel::class, 'course_id', 'id');
    }
}