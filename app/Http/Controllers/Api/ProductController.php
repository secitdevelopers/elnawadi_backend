<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProducts(): JsonResponse
    {
        try {
            $products = Product::activeAndSorted()->paginate(10);


            return response()->json([
                'products' => [
                    'current_page' => $products->currentPage(),
                    'data' => $products->items(),
                    'first_page_url' => $products->url(1),
                    'from' => $products->firstItem(),
                    'last_page' => $products->lastPage(),
                    'last_page_url' => $products->url($products->lastPage()),
                    'next_page_url' => $products->nextPageUrl(),
                    'path' => $products->path(),
                    'per_page' => $products->perPage(),
                    'prev_page_url' => $products->previousPageUrl(),
                    'to' => $products->lastItem(),
                    'total' => $products->total(),
                ],
                'message' => 'Success',
                'status_code' => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve products.' . $e, 'status_code' => 500], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProductsBysubCatogery($subCatogeryId): JsonResponse
    {
        try {
            $validator = Validator::make(['subCategoryId' => $subCatogeryId], [
                'subCategoryId' => 'required|integer|exists:categories,id',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation error', 'errors' => $validator->errors(), 'status_code' => 400], 400);
            }


            $products = Product::where('category_id', '=', $subCatogeryId)->activeAndSorted()->paginate(10);



            return response()->json([
                'products' => [
                    'current_page' => $products->currentPage(),
                    'data' => $products->items(),
                    'first_page_url' => $products->url(1),
                    'from' => $products->firstItem(),
                    'last_page' => $products->lastPage(),
                    'last_page_url' => $products->url($products->lastPage()),
                    'next_page_url' => $products->nextPageUrl(),
                    'path' => $products->path(),
                    'per_page' => $products->perPage(),
                    'prev_page_url' => $products->previousPageUrl(),
                    'to' => $products->lastItem(),
                    'total' => $products->total(),
                ],
                'message' => 'Success',
                'status_code' => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve products.', 'status_code' => 500], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getProductById($productId): JsonResponse
    {
        try {
            $validator = Validator::make(
                ['productId' => $productId],
                ['productId' => 'required|integer|exists:products,id'],
            );


            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation error',
                    'errors' => $validator->errors(),
                    'status_code' => 400,
                ], 400);
            }

            $products = Product::ProductById()->findOrFail($productId);




            // $shop=Setting::where('user_id','')->
            // $relatedProducts = Product::where('sub_category_id', $products->sub_category_id)->where('id', '!=', $products->id)->activeAndSorted()->take(5)->get();

            // $relatedProducts->each(function ($product) {
            //     $product->final_price;
            // });



            return response()->json([
                'product' => $products,
                // 'related_products' => $relatedProducts,
                'message' => 'Success',
                'status_code' => 200,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to retrieve product.',
                'status_code' => 500,
                'error' => $th->getMessage(),
            ], 500);
        }
    }
    public function updateViews($id)
    {

        
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'erorr', 'status_code' => 404,], 404);
        }
    
        $product->views += 1;
        $product->save();
    
        return response()->json(['message' => 'Success', 'status_code' => 200,],200);
    }

    public function searchProduct(Request $request): JsonResponse
    {
        try {
            // Validate the request parameters
            $validator = Validator::make($request->all(), [
                'keyword' => 'required|string|min:3',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation error', 'errors' => $validator->errors(), 'status_code' => 400], 400);
            }

            $keyword = $request->input('keyword');

            $products = Product::ActiveAndSortedForSearch($keyword)->paginate(10);

            $products->each(function ($product) {
                // The 'final_price' attribute will be automatically accessed using the accessor
                $product->final_price;
            });

            return response()->json([
                'products' => [
                    'current_page' => $products->currentPage(),
                    'data' => $products->items(),
                    'first_page_url' => $products->url(1),
                    'from' => $products->firstItem(),
                    'last_page' => $products->lastPage(),
                    'last_page_url' => $products->url($products->lastPage()),
                    'next_page_url' => $products->nextPageUrl(),
                    'path' => $products->path(),
                    'per_page' => $products->perPage(),
                    'prev_page_url' => $products->previousPageUrl(),
                    'to' => $products->lastItem(),
                    'total' => $products->total(),
                ],
                'message' => 'Success',
                'status_code' => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to search products.' . $e, 'status_code' => 500], 500);
        }
    }
}

//    $attributeSizes = [];
//                 $attributeColors = [];
//                 $attributeSizesAndColors = [];

//                 foreach ($product->attribute as $attr) {
//                     if ($attr->size_id && !$attr->color_id) {
//                         $attributeSizes[] = $attr;
//                     } elseif ($attr->color_id && !$attr->size_id) {
//                         $attributeColors[] = $attr;
//                     } elseif ($attr->color_id && $attr->size_id) {
//                         $attributeSizesAndColors[] = $attr;
//                     }
//                 }

//                 $response = array_merge($product->toArray(), [
//                     'attributeSizes' => $attributeSizes,
//                     'attributeColors' => $attributeColors,
//                     'sizes_colors' => $attributeSizesAndColors,
//                 ]);