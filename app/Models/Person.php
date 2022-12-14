<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'person';

    protected $fillable = ['name', 'gender', 'birthday'];

    public function address() {
        return $this->hasMany('Apps\Models\Address', 'person_id', 'id');
    }
}
