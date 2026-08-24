<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Catagories;
use App\Models\Settings;
use App\Models\Shop\Plan;
use App\Models\Shop\Product;
use App\Models\Shop\Reviews;
use App\Models\Shop\Whishlist;
use App\Models\Slide\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $today = now()->toDateString();

        Product::query()
            ->where('is_deal', true)
            ->whereDate('deal_target', '<', $today)
            ->update([
                'is_deal' => false,
                'deal_index' => false,
            ]);

        $indexDeal = Product::query()
            ->where('is_deal', true)
            ->min('id');

        if ($indexDeal !== null) {
            Product::query()
                ->where('is_deal', true)
                ->update(['deal_index' => false]);

            Product::query()
                ->whereKey($indexDeal)
                ->update(['deal_index' => true]);
        }

        return view('shop', [
            'feature' => Product::query()->where('is_featured', true)->get(),
            'setting' => $this->siteSettings(),
            'product' => Product::query()->get(),
            'slidelist' => Slide::query()->get(),
            'catagories' => Catagories::query()->get(),
            'feature_catagory' => Catagories::query()->where('is_featured', true)->get(),
            'is_deal' => Product::query()->where('is_deal', true)->get(),
            'plan' => Plan::query()->get(),
            'product_discount' => Product::query()->where('product_discount', '>=', 1)->get(),
            'product_trending' => Product::query()->where('product_trending', true)->get(),
            'selected_menu' => Catagories::query()->where('is_menu', true)->get(),
            'whishlist' => Whishlist::query()->where('user_id', Auth::id())->get(),
            'index_deal' => $indexDeal,
        ]);
    }

    public function addToCart($id)
    {
        $product = Product::query()->findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'price' => $product->product_logical_price,
                'image' => $product->main_image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('message', 'Product added to cart');
    }

    public function remove(Request $request)
    {
        if (! $request->id) {
            return response()->noContent();
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }

        session()->flash('message', 'Product successfully removed');

        return response()->noContent();
    }

    public function update(Request $request)
    {
        if (! $request->id || ! $request->quantity) {
            return response()->noContent();
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = max(1, (int) $request->quantity);
            session()->put('cart', $cart);
            session()->flash('message', 'Quantity updated successfully!');
        }

        return response()->noContent();
    }

    public function whishList(Request $request)
    {
        if ($request->pro_whish) {
            Whishlist::query()->firstOrCreate([
                'user_id' => Auth::id(),
                'product_id' => $request->pro_whish,
            ]);

            return redirect()->back()->with('message', 'Product added to Whishlist');
        }

        if ($request->pro_unwhish) {
            Whishlist::query()
                ->where('user_id', Auth::id())
                ->where('product_id', $request->pro_unwhish)
                ->delete();

            return redirect()->back()->with('message', 'Product removed from Whishlist');
        }

        return redirect()->back()->with('message', 'Whoops try again');
    }

    public function search(Request $request)
    {
        if (! $request->ajax()) {
            return response('Search for products');
        }

        $products = Product::query()
            ->where('product_name', 'LIKE', '%' . $request->search . '%')
            ->get();

        $output = '';

        foreach ($products as $product) {
            $output .= '<a class="search_text" href="product_details?pro=' . $product->id . '">'
                . '<b>' . e($product->product_name) . '</b></a><br>';
        }

        return response($output);
    }

    public function review(Request $request)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'integer', 'min:1'],
            'review' => ['required', 'string', 'min:3'],
            'rating' => ['nullable', 'numeric'],
        ]);

        Reviews::query()->create([
            'user_id' => Auth::id(),
            'reviewer_user_name' => auth()->user()->name,
            'product_id' => $validated['product_id'],
            'review' => $validated['review'],
            'rated' => $validated['rating'] ?? null,
        ]);

        return redirect()->back()->with('message', 'Thank you for your valuable feedback.');
    }

    public function product_list()
    {
        return view('products', [
            'product' => Product::query()->get(),
            'setting' => $this->siteSettings(),
            'catagories' => Catagories::query()->get(),
        ]);
    }

    private function siteSettings(): Settings
    {
        return Settings::query()->first() ?? new Settings([
            'webname' => config('app.name', 'Boldinone'),
            'email' => '',
            'address1' => '',
            'address2' => '',
            'phone' => '',
            'about' => '',
            'currency' => 'USD',
        ]);
    }
}
