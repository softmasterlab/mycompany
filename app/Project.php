<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'projects';
    protected $fillable = [
        'proj_name', 'description', 'image_path', 'start', 'finish', 
        'dep_id', 'status', 'created_at', 'updated_at'
    ];
}
