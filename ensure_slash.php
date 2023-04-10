<?php

use Illuminate\Container\Container;

function ensure_slash ($path) {

    if (str_contains("/#", $path)) {
        return $path;
    }

    if (str_contains($path, "#")) {
        [$uri, $hash] = explode("#", $path);

        if (!str_ends_with($uri, "/")) {
            return $uri . '/' . '#' . $hash;
        }

        return $path;
    }

    return str_ends_with($path, "/") === false ? $path . "/" : $path;
}

function urlWithSlash($path) {
    $c = Container::getInstance();

    return trim($c['config']['baseUrl'], '/') . '/' . $path;
}