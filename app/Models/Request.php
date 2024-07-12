<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'correlation_id',
        'service',
        'merchant_uuid',
        'user_uuid',
        'user_type',
        'response_time',
        'memory_usage',
        'memory_peak_usage',
        'ip',
        'host',
        'path',
        'status',
        'method',
        'headers',
        'payload',
        'response',
    ];

    /**
     * Return Exception relationship.
     * 
     * @return App\Models\Exception
     */
    public function exceptions()
    {
        return $this->hasMany(Exception::class, 'correlation_id', 'correlation_id');
    }

    /**
     * Return Query relationship.
     * 
     * @return App\Models\Query
     */
    public function queries()
    {
        return $this->hasMany(Query::class, 'correlation_id', 'correlation_id');
    }
}
