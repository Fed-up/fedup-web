<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = ['link_id', 'file_name', 'file_size', 'file_mime', 'file_path', 'type', 'ordering'];

    public function Post()
    {
        return $this->belongsTo('App\Models\Post', 'id', 'link_id');
        // ->withPivot('id','link_id','text', 'section', 'active');
    }
}
