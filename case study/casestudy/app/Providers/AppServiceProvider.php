<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\admin\CategoriModel;
use App\Models\admin\CustomerModel;
use App\Models\admin\LoginModel;
use App\Models\admin\ProductModel;
use App\View\Composer\ProfileComposer;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Repository::class, EloquentRepository::class);

        $this->app->singleton(CustomerServiceImpl::class, CustomerService::class);
        $this->app->singleton(CustomerRepositoryImpl::class, CustomerRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        $products = ProductModel::all();
        $category = CategoriModel::all();
        $customer = CustomerModel::all();
         view()->share('products', $products);
         view()->share('category', $category);
         view()->share('customer', $customer);
         View::composer('*', function ($view) {
            $view->with('admin', 'admin');
        });
        View::composer('*', function ($view) {
            $admin = Auth::guard('admin_login')->user();
            $view->with('admin', $admin);

        });
     
     }
}
