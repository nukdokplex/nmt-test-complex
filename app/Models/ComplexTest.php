<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ComplexTest extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * @param Builder $query
     * @param $userId
     *
     * @return Builder
     */
    public function scopeByOwner($query, $userId){
        return $query->where('owner_id', "=", $userId);
    }

    /**
     * @param Builder $query
     * @param $userId
     *
     * @return Builder
     */
    public function scopeById($query, $id){
        return $query->where('id', "=", $id);
    }
}
