<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Units extends Model
{
    use HasFactory;
    use Sluggable;  

    protected $fillable = [
        'unit_site_id',
        'finding_reference_id',
        'unit_type',
        'unit_name',
        'unit_slug',
        'unit_model',
        'unit_serial_id',
        'unit_cust_reference',
        'unit_image',        
        'ordering'
    ];  
    
    public function sluggable(): array
    {
        return [
            'unit_slug' => [
                'source' => 'unit_name'
            ]
        ];
    }
}
