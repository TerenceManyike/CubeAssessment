<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use \DB;

class ProductController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::with(['variants'])->get();

        $variants = Variant::get();

        return view('admin.products.index', compact('products', 'variants'));
    }

    public function create(Product $product)
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Gets all variants belonging to products 
        $available_variants = DB::table('product_variant')
                                ->distinct()
                                ->pluck('variant_id');

        $variants = Variant::whereNotIn('id', $available_variants)->pluck('name', 'id');

        $product->load('variants');

        return view('admin.products.create', compact('product','variants'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        $product->variants()->sync($request->input('variants', []));

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Gets all variants id's belonging to products 
        $selected_variants_id = DB::table('product_variant')
                                ->distinct()
                                ->pluck('variant_id');

        $available_variants = Variant::whereNotIn('id', $selected_variants_id)->select('name', 'id');

        //Gets all variant id's belonging to this product
        $variants_id = DB::table('product_variant')
                            ->where('product_id', $product->id)
                            ->pluck('variant_id');

        $variants = Variant::whereIn('id', $variants_id)
                            ->union($available_variants)
                            ->pluck('name', 'id');

        //Gets all category id's this product belongs
        $categories_id = DB::table('category_product')
                            ->where('product_id', $product->id)
                            ->pluck('category_id');  

        $other_ctegories = Category::whereNotIn('id', $categories_id)->pluck('name', 'id');

        $product->load('variants');

        return view('admin.products.edit', compact('product', 'variants', 'other_ctegories'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        $product->variants()->sync($request->input('variants', []));

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('variants', 'productCategories');

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        $products = Product::find(request('ids'));

        foreach ($products as $product) {
            $product->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    //Add product to category from product edit page
    public function addToCategory(Product $product, Request $request)
    {
        $category_id = $request->category ?? '' ;
        $product_id = $request->product ?? '' ;

        if(isset($category_id, $product_id)){
            DB::table('category_product')->insert(
                [
                    'category_id' => $category_id,
                    'product_id' => $product_id
                ]
            );

            return redirect()->route('admin.products.edit', $product->id) ;
        }
    }
}
