<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'accountant_id',
        'name',
        'cnpj',
        'email',
        'phone'
    ];

    public function accountant()
    {
        return $this->belongsTo(Accountant::class);
    }

    public function tasks()
    {
        return $this->hasMany(CompanyTask::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}