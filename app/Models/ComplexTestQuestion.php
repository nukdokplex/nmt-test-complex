<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ComplexTestQuestion extends Model
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
     * No timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @param Builder $query
     * @param $test_id
     *
     * @return Builder
     */
    public function scopeByTestId($query, $test_id){
        return $query->where("test_id", '=', $test_id);
    }
}
