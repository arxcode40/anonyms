<?php

use CodeIgniter\I18n\Time;

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter.com/user_guide/extending/common.html
 */
if (! function_exists('current_year')) {
    function current_year(): string
    {
        return (string) Time::now()->getYear();
    }
}

if (! function_exists('method_spoofing')) {
    function method_spoofing(string $method): string
    {
        return form_hidden('_method', $method);
    }
}

if (! function_exists('app_asset_url')) {
    function app_asset_url(string $path): string
    {
        $path = ltrim($path, '/');

        if (ENVIRONMENT === 'production') {
            $extension    = pathinfo($path, PATHINFO_EXTENSION);
            $basePath     = substr($path, 0, -strlen(".{$extension}"));
            $minifiedPath = "{$basePath}.min.{$extension}";

            if (is_file(FCPATH . $minifiedPath)) {
                return base_url($minifiedPath);
            }
        }

        return base_url($path);
    }
}
