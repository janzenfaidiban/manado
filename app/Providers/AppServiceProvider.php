<?php

namespace App\Providers;

use App\Models\Gelarbelakang;
use App\Models\Gelardepan;
use App\Models\Golongandarah;
use App\Models\Hubungankeluarga;
use App\Models\Intra;
use App\Models\Klasis;
use App\Models\Wilayah;
use App\Models\Jemaat;
use App\Models\Kartukeluarga;
use App\Models\Anggotakeluarga;
use App\Models\Jenispekerjaan;
use App\Models\Pendidikanterakhir;
use App\Models\Penyandangcacat;
use App\Models\Statusbaptis;
use App\Models\Statusdomisili;
use App\Models\Statuspernikahan;
use App\Models\Statussidi;
use App\Models\Suku;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        Carbon::setLocale('id');


        try {
            // Your super fun database stuff
            view()->share([

                // site information
                'siteTitle' => 'Database Jemaat',
                'siteDescription' => 'Sistem Informasi Pendataan Jemaat Gereja Kemah Inil Indonesia GKII Moria Manado',

                'siteLogo' => 'assets/img/site-logo.png',
                'siteFavicon' => 'assets/img/site-logo.png',

                'author' => 'Yudinus Alom',

                // site copyright info
                'siteCopyright' => '<script>document.write(new Date().getFullYear())</script> &copy; Sistem Informasi Pendataan Jemaat Gereja Kemah Inil Indonesia GKII Moria Manado oleh by <a href="https://github.com/YudinusAlom" target="_blank">Yudinus Alom</a>',
                
                // footer links
                'footerLinks' => 'footerLinks',


            ]);
        } catch (\Exception $e) {
            // do nothing
        }
    }
}
