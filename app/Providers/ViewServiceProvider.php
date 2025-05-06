<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\Categoria;
use App\Models\Material;

class ViewServiceProvider extends ServiceProvider
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
        // Compartilhar as contagens com todas as views
        View::composer('*', function ($view) {
            $view->with('counts', [
                'produtos' => Produto::count(),
                'clientes' => Cliente::count(),
                'categorias' => Categoria::count(),
                'materiais' => Material::count(),
            ]);
        });
    }
}
