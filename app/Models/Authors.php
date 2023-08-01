<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Authors extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name'
    ];
    protected $append = ['full_name'];

    public function getFullNameAttribute(){
        return $this->first_name . ' ' . $this->last_name;
    }

}
