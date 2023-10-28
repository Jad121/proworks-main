<?php

use Illuminate\Support\Facades\App;

function urlVersion($url = "")
{
    $version = "202310270719";
    return url("{$url}?v={$version}");
}

function  uri($endPoint = "")
{
    if (strpos($endPoint, "#") !== false) {
        return $endPoint;
    }
    $separator = "?";
    if (strpos($endPoint, $separator) !== false) {
        $separator = "&";
    }

    $queryString = "";
    if (request()->has("pwa")) {
        $queryString = "&pwa";
    }
    return url("{$endPoint}{$separator}lang=" . App::getLocale() . "$queryString");
}

function lang()
{
    return App::getLocale();
}