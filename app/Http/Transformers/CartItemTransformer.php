<?php
namespace App\Http\Transformers;

use App\CartItem;

class CartItemTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(CartItem $item)
    {
        return [
            'id' => (int)$item->id,
            'name' => $item->name,
            'description' => $item->description,
            'price' => (float)($item->price / 100)
        ];
    }
}