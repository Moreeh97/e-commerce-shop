<?php
namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['store','update','destroy']);
    }

    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return ProductResource::collection($products);
    }

    public function show(Product $product)
    {
        $product->load('category');
        return new ProductResource($product);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'nullable|string',
            'price'=>'required|numeric|min:0',
            'on_sale'=>'sometimes|boolean',
            'category_id'=>'required|exists:categories,id',
            'image'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products','public');
        }

        $product = Product::create($data);
        return (new ProductResource($product))->response()->setStatusCode(201);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'=>'sometimes|required|string|max:255',
            'description'=>'nullable|string',
            'price'=>'sometimes|required|numeric|min:0',
            'on_sale'=>'sometimes|boolean',
            'category_id'=>'sometimes|required|exists:categories,id',
            'image'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products','public');
        }

        $product->update($data);
        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return response()->json(['message'=>'Product deleted'], 200);
    }
}
