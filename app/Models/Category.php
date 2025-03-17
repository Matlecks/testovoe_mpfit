<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $table = 'categories';

    protected $fillable = [
        'name',
    ];

    public static function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
