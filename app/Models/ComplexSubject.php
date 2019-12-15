<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ComplexSubject extends Model
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
     * @param Builder $query
     * @param $subject_id
     *
     * @return Builder
     */
    public function scopeById($query, $subject_id){
        return $query->where("id", '=', $subject_id);
    }
}
