<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'amout',
        'phone',
        'purpose',
        'terms',
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}