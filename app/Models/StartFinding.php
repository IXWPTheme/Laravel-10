<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class StartFinding extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [              
            'find_site_id',
            'find_unit_id',
            'find_reference_id',
            'find_name',
            'find_slug',
            'find_desc',
            'find_before_img',
            'find_after_img',   
            'find_status',  
            'ordering'
        ];  
    
    public function sluggable(): array
    {
        return [
            'find_slug' => [
                'source' => 'find_name'
            ]
        ];
    }
}
