<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'correlation_id',
        'query',
        'elapsed_time',
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
