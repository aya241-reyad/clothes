<?php

namespace App\Http\Controllers\api;

use App\helpers\helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CardsResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\OfferResource;
use App\Http\Resources\ProducCatResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SettingResource;
use App\Http\Resources\SliderResource;
use App\Http\Resources\AllProductResource;

use App\Models\Card;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Rate;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function __construct()
    {
        $this->helper = new helper();
    }

    public function getCards(Request $request)
    {
        $cards = CardsResource::collection(Card::latest()->get());
        return $this->helper->ResponseJson(1, __('apis.success'), [
            'cards' => $cards,

        ]);
    }

    public function categories(Request $request)
    {
        $categories = CategoryResource::collection(Category::get());
        return $this->helper->ResponseJson(1, __('apis.success'), [
            'categories' => $categories,

        ]);

    }

    public function productByCat(Request $request)
    {
        $fields = $request->validate([
            'category_id' => 'nullable',
        ]);
        $category = ProducCatResource::collection(Category::where(function ($q) use ($request) {
            if ($request->category_id) {
                $q->where('id', $request->category_id);
            }

        })->with(['products' => function ($products) use ($request) {
             if ($request->filter == 'rate') {
                $products->where('category_id', $request->category_id)->orderBy('avg_rate', 'ASC')->get();

            }
            if ($request->filter == 'low') {
                $products->where('category_id', $request->category_id)->orderBy('price_after_tax', 'ASC')->get();

            }

            $products->where('category_id', $request->category_id)->orderBy('id', 'DESC')->get();
            

        }])
                ->latest()->get());

        return $this->helper->ResponseJson(1, __('apis.success'), [
            'categories' => $category,

        ]);

    }

    public function setting(Request $request)
    {

        $settings = SettingResource::collection(Setting::latest()->get());
        return $this->helper->ResponseJson(1, __('apis.success'), [
            'settings' => $settings,

        ]);
    }

    public function offers(Request $request)
    {

        $offers = OfferResource::collection(Offer::where('status', 1)->latest()->get());
        return $this->helper->ResponseJson(1, __('apis.success'), [
            'offers' => $offers,

        ]);

    }

    public function sliders()
    {
        $sliders = SliderResource::collection(Slider::where('status', 1)->latest()->get());
        return $this->helper->ResponseJson(1, __('apis.success'), [
            'sliders' => $sliders,

        ]);
    }

    public function getProduct(Request $request)
    {
        $rules = [
            'product_id' => 'required|exists:products,id',
        ];
        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {
            return $this->helper->responseJson(0, $validation->errors()->first());
        }

        $product = new ProductResource(Product::findOrFail($request->product_id));
        $rev = Rate::where('product_id', $request->product_id)->get()->avg('rate');
        return $this->helper->ResponseJson(1, __('apis.success'), [
            'poducts' => $product,

        ]);

    }
    
    public function AllProducts()
    {
        $products = AllProductResource::collection(Product::paginate(8));
                return $this->helper->ResponseJson(1, __('apis.success'), [
            'products' => $products->response()->getData(true),

        ]);

    }
    
        public function featured()
    {
        $products = AllProductResource::collection(Product::where('is_featured',1)->paginate(8));
                return $this->helper->ResponseJson(1, __('apis.success'), [
            'products' => $products->response()->getData(true),

        ]);

    }

    
}
