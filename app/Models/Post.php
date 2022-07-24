<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use softDeletes;




    //when use create tio insert data must write
    protected $fillable=['title','body'];

    //OR

    //protected $guarded=[];
}
