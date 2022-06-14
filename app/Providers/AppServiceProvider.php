<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use App\Models\ProductType;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Company;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layout_index.header', 'layout_index.page.product_detail','layout_index.page.view_type','layout_index.page.view_all_new',
                        'layout_index.page.view_all_sale', 'layout_index.page.news', 'layout_index.page.news-detail',
                        'layout_index.page.view_all_highlights','layout_index.page.product_company','layout_index.page.all_book','layout_index.page.search',
                        'layout_index.page.about', 'layout_index.index', 'layout_index.customer.info'], function ($view) {
            $types = ProductType::all();
            $product_n = [];
            $types_id = [];
            $types_name = [];
            foreach ($types as $t) {
                $product_numbers = Product::where('id_type', $t->id)
                    ->where('status', '1')
                    ->count('id');
                $product_n[] = $product_numbers;
                $types_id[] = $t->id;
                $types_name[] = $t->name;
            }
            $company = Company::all();
            $view->with(['types' => $types, 'company' => $company, 'product_n' => $product_n, 'types_id' => $types_id, 'types_name' => $types_name,]);
        });
        view()->composer(['emails.TestMail','layout_index.header', 'layout_index.page.cart', 'layout_index.page.checkout'], function ($view) {
            if (Session('cart')) {
                $oldcart = Session::get('cart');
                $cart = new Cart($oldcart);
                $view->with([
                    'cart' => Session::get('cart'),
                    'product_cart' => $cart->items,
                    'totalPrice' => $cart->totalPrice,
                    'totalQty' => $cart->totalQty
                ]);
            }
        });
        Schema::defaultStringLength(191);
    }
}