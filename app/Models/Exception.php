<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exception extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'correlation_id',
        'status',
        'message',
        'file',
        'line',
        'code',
        'headers',
        'trace',
    ];

    /**
     * Return Request relationship.
     * 
     * @return App\Models\Request
     */
    public function request()
    {
        return $this->belongsTo(Request::class, 'correlation_id', 'correlation_id');
    }
}
