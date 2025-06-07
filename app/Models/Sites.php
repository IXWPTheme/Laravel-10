<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Sites extends Model
{
    use HasFactory;
    use Sluggable;  

    protected $fillable = [
        'sites_tech_name',
        'sites_tech_employee_id',
        'sites_name',
        'sites_slug',
        'sites_address',
        'sites_city',
        'cus_company',
        'finding_ref',
        'sites_desc',
        'sites_image',
        'ordering'
    ];  
    
    public function sluggable(): array
    {
        return [
            'sites_slug' => [
                'source' => 'sites_name'
            ]
        ];
    }
}
