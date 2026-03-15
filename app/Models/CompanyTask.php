<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyTask extends Model
{
    protected $fillable = [
        'company_id',
        'task_id',
        'status',
        'due_date',
        'completed_at'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}