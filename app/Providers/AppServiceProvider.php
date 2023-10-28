<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        //accepted languages
        $laguages = [
            "en" => "ltr",
            "ar" => "rtl",
            "cn" => "ltr",
        ];

        $lang = request()->lang;

        //check if lang in query param is accepted or not, if not then take the first language
        if (!isset($laguages[$lang])) {
            $lang = array_key_first($laguages);
        }
        $dirc = $laguages[$lang];

        //get other lang, it will be used in change language button
        $otherLang = "";
        // foreach ($laguages as $language => $direction) {
        //     if ($language != $lang) {
        //         $otherLang = $language;
        //         break;
        //     }
        // }


        // User::init();
        App::setLocale($lang);

        view()->share("lang", $lang);
        view()->share("otherLang", $otherLang);
        view()->share("dirc", $dirc);
        view()->share("otherDirc", $dirc == "ltr" ? "rtl" : "ltr");
        view()->share("start", $dirc == "ltr" ? "left" : "right");
        view()->share("end", $dirc == "ltr" ? "right" : "left");

        $requestUriArr = explode("?", Request::getRequestUri());

        Config::set("route", substr($requestUriArr[0], 1));
        if (count($requestUriArr) > 1) {
            Config::set("queryParams", $requestUriArr[1]);
        }

        view()->share("pathInfo", Request::getPathInfo());
    }
}
