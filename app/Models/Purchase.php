<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    public $table = 'purchases';

    protected $fillable = [
        'product_id',
        'quantity',
        'total_price',
        'customer_name',
        'status',
        'comment',
    ];

    public static function rules(): array
    {
        return [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'customer_name' => 'required|string|max:255',
            'status' => 'nullable|string|in:новый,выполнен',
            'comment' => 'nullable|string',
        ];
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
