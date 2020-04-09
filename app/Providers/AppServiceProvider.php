<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\CakeFilling;
use App\AdditionalFiller;
use App\AdditionalDecoration;
use App\CakeTopDecoration;
use App\CakeSideDecoration;
use App\Order;

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
    public function boot(Dispatcher $events)
    {
        // \Schema::defaultStringLength(191);
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('ORDERS');
            $event->menu->add([
                // 'key' => 'CakeFilling',
                'text' => 'Order list',
                'url' => 'admin/orders',
                'label' => Order::all()->count(),
                'icon'    => 'fas fa-fw fa-th-order',
                // 'active' => ['pages', 'regex:@^content/[0-9]+$@']
            ]);
            $event->menu->add([
                // 'key' => 'CakeFilling',
                'text' => 'Order settings',
                'url' => 'admin/order-default-settings',
                // 'label' => Order::all()->count(),
                'icon'    => 'fas fa-fw fa-th-order',
                // 'active' => ['pages', 'regex:@^content/[0-9]+$@']
            ]);
            // $event->menu->add('');
            $event->menu->add([
                'key' => 'lang',
                'text' => 'Lang',
                'url' => 'admin/lang',
                // 'label' => Order::all()->count(),
                'icon'    => 'fas fa-fw fa-lang',
                // 'active' => ['pages', 'regex:@^content/[0-9]+$@']
            ]);


            // $event->menu->add([
            //     'key' => 'CakeFilling',
            //     'text' => 'Cake Filling',
            //     'url' => 'admin/cake-fillings',
            //     'label' => CakeFilling::all()->count(),
            //     'icon'    => 'fas fa-fw fa-th-list',
            //     // 'active' => ['pages', 'regex:@^content/[0-9]+$@']
            // ]);
            $event->menu->add('CAKE BUILDER');
            $event->menu->add([
                'key' => 'cake_ing',
                'text' => 'Cake ingredients',
                // 'url' => 'admin/cake-fillings',
                // 'label' => CakeFilling::all()->count(),
                'icon'    => 'fas fa-fw fa-th-list',
                // 'active' => ['pages', 'regex:@^content/[0-9]+$@']
            ]);
            $event->menu->addIn('cake_ing', [
                'key' => '',
                'text' => 'Cake Filling',
                'url' => 'admin/cake-fillings',
                'label' => CakeFilling::all()->count(),
                // 'icon'    => 'fas fa-fw fa-th-list',
            ]);
            $event->menu->addIn('cake_ing', [
                'key' => '',
                'text' => 'Cake top decor',
                'url' => 'admin/cake-top-decorations',
                'label' => CakeTopDecoration::all()->count(),
                // 'icon'    => 'fas fa-fw fa-th-list',
            ]);
            $event->menu->addIn('cake_ing', [
                'key' => '',
                'text' => 'Cake side decor',
                'url' => 'admin/cake-side-decorations',
                'label' => CakeSideDecoration::all()->count(),
                // 'icon'    => 'fas fa-fw fa-th-list',
            ]);
            $event->menu->addIn('cake_ing', [
                'key' => '',
                'text' => 'Cake more decor',
                'url' => 'admin/cake-additional-decorations',
                'label' => AdditionalDecoration::all()->count(),
                // 'icon'    => 'fas fa-fw fa-th-list',
            ]);
            $event->menu->addIn('cake_ing', [
                'key' => '',
                'text' => 'Cake more filling',
                'url' => 'admin/cake-additional-fillings',
                'label' => AdditionalFiller::all()->count(),
                // 'icon'    => 'fas fa-fw fa-th-list',
            ]);



            // $event->menu->addAfter('CakeFilling', [
            //     'key' => 'account_settings',
            //     'text' => 'Account Settings',
            // ]);
            // $event->menu->addIn('account_settings', [
            //     'key' => 'account_settings_notifications',
            //     'text' => 'Notifications',
            //     'url' => 'account/edit/notifications',
            // ]);
            // $event->menu->addBefore('account_settings_notifications', [
            //     'key' => 'account_settings_profile',
            //     'text' => 'Profile',
            //     'url' => 'account/edit/profile',
            // ]);
        });
    }
}
