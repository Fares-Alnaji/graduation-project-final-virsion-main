<?php

namespace App\Http\Controllers\dashboard;

use App\CartOps;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductValidate;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class , 'product');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category = Category::all();
        $products = Product::with('category')->paginate(8);
        return response()->view('dashboard.products.index',compact('products','category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //$parents = Product::all();
        $categories = Category::query()->get();
        return response()->view('dashboard.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            //
            'name' => [
                'required', 'string', 'min:3', 'max:255',
            ],
            'description' => [
                'required', 'string', 'min:5', 'max:200'
            ],
            'price' => [
                'required','numeric','min:0'
            ],
            'compare_price' => [
                'nullable','numeric','min:0','gt:price'
            ],
            'image' => [
              'required','mimes:png,jpg', 'max:3025'
            ],
            'status' => 'in:active,draft,archived',
            ]);
            $product = new Product;
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->category_id = $request->input('category_name');
            $product->compare_price = $request->input('compare_price');
            $product->status = $request->input('status');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = $file->store('uploads', [
                    'disk' => 'public',
                ]);
                $data['image'] = $path;
            $product->image =$data['image'];
            }
            $product->save();
        return redirect()->route('products.index')->with('success', 'product created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('dashboard.products.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Product $product)
    {
        //
        // $product = product::findOrFail($id);
        $categories = Category::query()->get();
        return response()->view('dashboard.products.edit', ['product' => $product,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
          'name' => [
                    'required', 'string', 'min:3', 'max:255'
                ],
                'price' => [
                    'required','numeric','min:0'
                ],
                'compare_price' => [
                    'required','numeric','min:0','gt:price'
                ],
                'description' => [
                    'nullable', 'string', 'min:5', 'max:200'
                ],
                'category_name' => [
                    'required', 'string'
                ],
                'status' => 'required|in:active,archived',
        ]);

        // $product = product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_name');
        $product->compare_price = $request->input('compare_price');
        $product->status = $request->input('status');
        $old_image = $product->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', [
                'disk' => 'public',
            ]);
            $data['image'] = $path;
        }
        $product->save();
        $old_image = $product->image;
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', [
                'disk' => 'public',
            ]);
            $data['image'] = $path;
        }
        $product->update($data);
        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Product $product)
    {
        //
        // $product=Product::findOrFail($id);
        $product->delete();
         return redirect()->back()->with('error', 'Product Deleted!');
    }
    public function trash()
    {
        $products = Product::onlyTrashed()->paginate();
        return response()->view('dashboard.products.trash', ['products' => $products]);
    }
    public function restore($id)
    {
        $Product = Product::onlyTrashed()->findOrFail($id);
        $Product->restore();
        return redirect()->back();
    }
    public function forceDelete($id)
    {
        $Product = Product::onlyTrashed()->findOrFail($id);
        $Product->forceDelete();
        if ($Product->image) {
            Storage::disk('public')->delete($Product->image);
        }
        return redirect()->route('products.trash');
    }

}
