<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesMangModel extends Model
{
    use HasFactory;
    protected $table = 'stu_fee';

    public function stuFeesManage()
    {
        return $this->hasMany(FeesSubmissonModel::class, 'reg', 'reg');
    }

}
