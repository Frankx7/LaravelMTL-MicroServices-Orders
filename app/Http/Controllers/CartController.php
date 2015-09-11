<?php
namespace App\Http\Controllers;

use App\CartItem;
use App\Http\Transformers\CartItemTransformer;
use Illuminate\Http\Request;

class CartController extends ApiController
{

    public function index()
    {
        return $this->respondWithCollection(CartItem::all(), new CartItemTransformer);
    }

    public function store(Request $request)
    {
        $validation = $validator = $this->isValid($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'numeric|required'
        ]);

        if ($validation->fails()) {
            $this->setStatusCode(400);
            return $this->respondWithError($validation->getMessageBag()->all(), self::CODE_WRONG_ARGS);
        }

        $product = new CartItem;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = round($request->price * 100);
        $product->save();

        return $this->respondWithItem($product, new CartItemTransformer);
    }
}
