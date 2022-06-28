<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    public $table = "employee";

    protected $fillable = [
        'first_name',
        'last_name',
        'start_date',
        'end_date',
        'title',
        'branch_id',
        'department_id'
    ];

    public function branches()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function departments()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
}
