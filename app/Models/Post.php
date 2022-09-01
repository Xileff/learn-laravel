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

    // Buat eager loading jika kita query lebihh dari 1 tabel, biar optimal kalo ada perulangan(menghindari N+1 problem)
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

    // QueryScope untuk membentuk query sesuai kebutuhan
    public function scopeFilter($query, array $filters)
    {
        // Ini versi singkat daripada yang di atas
        // $query->when($filters['search'] ?? false, function ($query, $search) {
        //     return $query->where('title', 'like', '%' . $search . '%')
        //         ->orWhere('body', 'like', '%' . $search . '%');
        // });

        // Perbaikan di atas
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        // Itu kalo ga diperbaikin, ini bakal salah kueri
        // http://127.0.0.1:8000/posts?author=plailasari&search=accusamus&category=personal
        // Hasil kuerinya ga bener

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        // // parameter whereHas() adalah method yg dimiliki model ini(category/author). gunanya untuk cek relasi
        $query->when($filters['author'] ?? false, function ($query, $author) {
            return $query->whereHas('author', function ($query) use ($author) {
                $query->where('username', $author);
            });
        });
        // parameter where() adalah nama kolom, gunanya utk build query
    }

    // Contoh pemanggilan : 
    // Post::latest()->filter(request(['search']))->get()
}
