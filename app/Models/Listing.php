<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'logo', 'company', 'location', 'website', 'email', 'description', 'tags', 'user_id'
    ];
    public function scopeFilter($query, $filter)
    {
        if ($filter['tag'] ?? false) {
            $query->where('tags', 'like', '%' . $filter['tag'] . '%');
        }
        if ($filter['search'] ?? false) {
            $query->where('title', 'like', '%' . $filter['search'] . '%')
                ->orWhere('description', 'like', '%' . $filter['search'] . '%');
        }
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
