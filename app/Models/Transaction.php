<?php

namespace App\Models;

use App\Models\KhatType;
use App\Models\TransactionType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'transaction_types_id',
        'khat_type_id'
    ];

    public function khat()
    {
        return $this->belongsTo(KhatType::class, 'khat_type_id', 'id');
    }

    public function transaction_type()
    {
        return $this->belongsTo(TransactionType::class, 'transaction_types_id', 'id');
    }
}