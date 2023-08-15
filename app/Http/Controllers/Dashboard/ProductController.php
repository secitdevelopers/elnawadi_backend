<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProducttRequest;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Traits\ImageProcessing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use ImageProcessing;
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('dashboard.product.index', compact('products','categories'));
    }
    public function productSpacial()
    {
        $products = Product::where('user_id',Auth::user()->id)->get();

        return view('dashboard.product.products-special', compact('products'));
    }
    
    public function productsInactive()
    {
        $products = Product::where('status', 0)->get();

        return view('dashboard.product.products-inactive', compact('products'));
    }

    public function create()
    {

        $categories = Category::all();
        return view('dashboard.product.store', compact('categories'));
    }


    public function store(StoreProducttRequest $request)
    {

        DB::beginTransaction();
        try
        {
            $product = new Product;
            $product->name_ar = $request['name_ar'];
            // $product->name_en = $request['name_en'];
            $product->category_id = $request['category_id'];
            // $product->sub_category_id = $request['sub_category_id'];
            $product->price = number_format($request['price'], 2);
            $product->quantity = $request['quantity'];
            // $product->shipping_fee = number_format($request['shipping_fee'], 2);
            // $product->arrange = $request['arrange'];
            // $product->weight = $request['weight'];
            $product->status = true;



            // if (Auth::User()->hasRole('admin'))
            // {
            //     $product->status = true;
            // }
            // else if (Auth::User()->hasRole('vendor'))
            // {
            //     $product->status = false;
            // }
            // else
            // {
            //     session()->flash('delete', 'فشلة العمليه');
            //     return redirect()->back()->withSuccess('error');
            // }






            $product->description_ar = $request['description_ar'];
            // $product->description_en = $request['description_en'];
            $data['image'] = $this->saveImage($request->file('image'), 'product');
            $product->image = 'imagesfp/product/' . $data['image'];
            $product->user_id = Auth::user()->id;
            // $product->weight = $request['weight'];
            // if (!$request['discount'])
            // {
            //     $product->discount = number_format($request['discount'], 2);
            //     $product->discount_start = $request['discount_start'];
            //     $product->discount_end = $request['discount_end'];
            // }
            $product->save();
            DB::commit();
            session()->flash('Add', 'تم اضافة المنتج بنجاح ');
            return redirect()->route('products')->with('success', 'Category created successfully');
        }
        catch (\Exception $e)
        {
            DB::rollback();
            throw $e;
        }
    }


    public function show($id)
    {
        //
    }
    public function affiliateProduct(Request $request)
    {
        $id = $request->input('id');
        $locale = $request->input('locale');
        $product = Product::with('images', 'attribute.size', 'attribute.color')
            ->select('id', 'name_' . $locale . ' AS name', 'price', 'image', 'discount_start', 'discount_end', 'discount', 'description_' . $locale . ' AS description', 'quantity', 'sub_category_id', 'views')
            ->findOrFail($id);

        $product->each(function ($product)
        {
            $product->final_price;
        });

        $relatedProducts = Product::where('sub_category_id', $product->sub_category_id)->where('id', '!=', $product->id)->activeAndSorted()->take(5)->get();

        $relatedProducts->each(function ($product)
        {
            $product->final_price;
        });

        return view('dashboard.product.product-detalis', compact('product', 'locale'));
    }

    public function edit(int $id)
    {
        $product = Product::with(['images'])->findOrFail($id);

        $category = Category::findOrFail($product->subCategory->category_id);
        $subcategories = SubCategory::where('category_id', $category->id)->get();

        $categories = Category::all();
        $attributes = Attribute::where('product_id', $product->id)->get();
        $colors = Color::all();
        $sizes = Size::all();
        $attributeSizes = [];
        $attributeColors = [];
        $sizes_colors = [];
        foreach ($attributes as $index => $value)
        {
            if ($value->size_id == null)
            {
                $attributeColors[] = $value;
            }
            else if ($value->color_id == null)
            {
                $attributeSizes[] = $value;
            }
            else
            {
                $sizes_colors[] = $value;
            }
        }
        // return $sizes_colors;
        //     return response()->json([
        //         'product' => $product,  'category' => $category,
        //         'subcategories' => $subcategories, 
        //         'categories' => $categories, 
        //         'attributeSizes' => $attributeSizes,
        //         'attributeColors' => $attributeColors,
        //         'colors' => $colors,'sizes' => $sizes,
        // ]);
        return view('dashboard.product.update', compact('product', 'category', 'subcategories', 'categories', 'attributeSizes', 'attributeColors', 'sizes_colors', 'sizes', 'colors'));
    }


    public function update(Request $request)
    {
        DB::beginTransaction();
        try
        {
            $product = Product::findOrFail($request->id);
            $product->name_ar = $request->input('name_ar');
            // $product->name_en = $request->input('name_en');
            $product->category_id = $request->input('category_id');
            $product->price = number_format($request->input('price'), 2);
            // $product->quantity = $request->input('quantity');
            // $product->weight = $request->input('weight');
            // $product->shipping_fee = number_format($request['shipping_fee'], 2);
            // if ($request->input('discount') == "0.0")
            // {
            //     $product->discount = 0;
            //     $product->discount_start = null;
            //     $product->discount_end = null;
            // }else{
            //     $product->discount = number_format($request->input('discount'), 2);
            //     $product->discount_start = $request->input('discount_start');
            //     $product->discount_end = $request->input('discount_end');
            // }
            // $product->arrange = $request->input('arrange');
            $product->description_ar = $request->input('description_ar');
            // $product->description_en = $request->input('description_en');
            $product->user_id = Auth::user()->id;
            // if (Auth::User()->hasRole('admin'))
            // {
            //     $product->status = true;
            // }
            // else if (Auth::User()->hasRole('vendor'))
            // {
            //     $product->status = false;
            // }
            // else
            // {
            //     session()->flash('delete', 'فشلة العمليه');
            //     return redirect()->back()->withSuccess('error');
            // }
            // Check if user can update product
             if (Auth::user()->hasRole('admin') || (true && Auth::user()->hasRole('vendor'))) {
            if ($request->hasFile('image'))
            {
                $data['image'] = $this->saveImage($request->file('image'), 'product');
                $product->image = 'imagesfp/product/' . $data['image'];
            }
            $product->save();




            // Update product attributes
            // $colors = $request->input('colors', []);
            // $colorsPrice = $request->input('colors_price', []);

            // foreach ($colors as $index => $color)
            // {
            //     $attribute = Attribute::updateOrCreate(
            //         ['product_id' => $product->id, 'color_id' => $colors[$index], 'size_id' => null],
            //         ['price' => number_format($colorsPrice[$index], 2), 'quantity' => 1, 'sku' => 'zxc']
            //     );
            // }

            // $sizes = $request->input('sizes', []);
            // $sizesPrice = $request->input('sizes_price', []);

            // foreach ($sizes as $index => $size)
            // {
            //     $attribute = Attribute::updateOrCreate(
            //         ['product_id' => $product->id, 'size_id' => $sizes[$index], 'color_id' => null],
            //         ['price' => number_format($sizesPrice[$index], 2), 'quantity' => 1, 'sku' => 'zxc']
            //     );
            // }

            // $attributeSizes = $request->input('attribute_size', []);
            // $attributeColors = $request->input('attribute_color', []);
            // $attributePrices = $request->input('attribute_price', []);

            // foreach ($attributeSizes as $index => $attributeSize)
            // {
            //     $attribute = Attribute::updateOrCreate(
            //         ['product_id' => $product->id, 'size_id' => $attributeSize, 'color_id' => $attributeColors[$index]],
            //         ['price' => number_format($attributePrices[$index], 2), 'quantity' => 1, 'sku' => 'zxc']
            //     );
            // }

            // // Update product images
            // if ($request->hasFile('images'))
            // {
            //     $images = $request->file('images');
            //     foreach ($images as $index => $image)
            //     {
            //         $data['image'] = $this->saveImage($image, 'product');
            //         $productImage = new ProductImage;
            //         $productImage->product_id = $product->id;
            //         $productImage->image = 'imagesfp/product/' . $data['image'];
            //         $productImage->save();
            //     }
            // }
            session()->flash('Add', 'تم تعديل المنتج بنجاح');
            DB::commit();
            return redirect()->back()->with('success', 'Product updated successfully.');
            } else {
                DB::rollback();
                 session()->flash('Add', 'لا يمكنكك التعديل علي المنتج');
                return redirect()->back()->with('error', 'You are not authorized to update this product.');
            }
        }
        catch (\Exception $e)
        {
          
            DB::rollback();
              return $e->getMessage();
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try
        {
            // Retrieve the product
            $product = Product::findOrFail($request->id);
            $this->deleteImage($product->image);

            // Delete the product images and remove the images from storage
            $product->images()->each(function ($image)
            {
                $this->deleteImage($image->image);
            });

            // Delete the product
            $product->delete();

            DB::commit();
            session()->flash('delete', 'تم الحذف  ');
            return redirect()->back()->withSuccess('Product deleted successfully.');
        }
        catch (\Exception $e)
        {
            DB::rollback();
            throw $e;
        }
    }


    public function updateStatusProduct(Request $request)
    {
        $isToggleOnString = (string) $request->isToggleOn;
        $status = true;
        $productId = $request->input('productId');
        if ($isToggleOnString == "true")
        {
            $status = true;
        }
        else
        {
            $status = false;
        }



        $product = Product::find($productId);

        if ($product)
        {
            // Update the status field
            $product->status = $status;
            $product->save();

            return response()->json(['success' => true, 'message' => 'product status  updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'product not found']);
    }

    public function getSubsections(Request $request)
    {
        $categoryId = $request->input('category');

        // Retrieve subsections based on the selected category ID
        $subcategory = SubCategory::where('category_id', $categoryId)->pluck('name_ar', 'id');

        return response()->json($subcategory, 200);
    }
}