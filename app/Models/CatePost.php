<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatePost extends Model
{
    public $timestamps = false;
    protected $fillable = ['category_post_name','category_post_status','category_post_slug'];

    protected $primaryKey = 'category_post_id';
    protected $table = 'tbl_category_post';

    public function post(){
        $this->hasMany('App\Models\Post');
    }
}
