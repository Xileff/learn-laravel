<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Yg boleh diisi langsung 
    // protected $fillable = ['title', 'excerpt', 'body'];

    // Yg ga boleh diisi langsung
    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    // nama method harusnya sesuai nama field di database
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
