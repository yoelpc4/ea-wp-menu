<?php

namespace Yoelpc4\EAWpMenu;

use \Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset;

class EAWpMenu extends Preset
{
    /**
     * Install the preset
     */
    public static function install()
    {
        static::cleanResources();
        static::removeNodeModules();
        static::updatePackages();
        static::updateWebpackMix();
        static::updateResources();
        static::updatePublic();
        static::updateStorage();
        \Artisan::call('config:clear');
        \Artisan::call('view:clear');
    }

    /**
     * Clean resources directory
     */
    protected static function cleanResources()
    {
        \File::cleanDirectory(resource_path('js'));
        \File::cleanDirectory(resource_path('sass'));
        \File::cleanDirectory(resource_path('views'));
    }

    /**
     * Append package array for package.json
     *
     * @return array
     */
    protected static function updatePackageArray()
    {
        return [
            "@fortawesome/fontawesome-free" => "^5.10.1",
            "ajv"                           => "^6.10.2",
            "axios"                         => "^0.18",
            "bootstrap"                     => "^4.0.0",
            "bootstrap-datepicker"          => "^1.9.0",
            "cross-env"                     => "^5.1",
            "datatables.net"                => "^1.10.19",
            "datatables.net-bs4"            => "^1.10.19",
            "datatables.net-buttons"        => "^1.5.6",
            "datatables.net-buttons-bs4"    => "^1.5.6",
            "dropzone"                      => "^5.5.1",
            "html5shiv"                     => "^3.7.3",
            "jquery"                        => "^3.2",
            "laravel-mix"                   => "^4.0.7",
            "lodash"                        => "^4.17.5",
            "moment"                        => "^2.24.0",
            "node-waves"                    => "^0.7.6",
            "nprogress"                     => "^0.2.0",
            "perfect-scrollbar"             => "^0.8.1",
            "popper.js"                     => "^1.12",
            "resolve-url-loader"            => "^2.3.1",
            "respond.js"                    => "^1.4.2",
            "sass"                          => "^1.15.2",
            "sass-loader"                   => "^7.1.0",
            "select2"                       => "^4.0.7",
            "sweetalert2"                   => "^8.14.0",
            "themify-icons-scss"            => "^1.0.0"
        ];
    }

    /**
     * Append webpack mix configuration
     */
    protected static function updateWebpackMix()
    {
        copy(__DIR__ . '/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    /**
     * Update resources directory from stubs directory
     */
    protected static function updateResources()
    {
        recursive_copy(__DIR__ . '/stubs/js', resource_path('js'));
        recursive_copy(__DIR__ . '/stubs/sass', resource_path('sass'));
        recursive_copy(__DIR__ . '/stubs/views', resource_path('views'));
    }

    /**
     * Update protected directory from stubs directory
     */
    protected static function updatePublic()
    {
        if (!file_exists(protected_path('vendor'))) {
            mkdir(protected_path('vendor'));
        }

        recursive_copy(__DIR__ . '/stubs/vendor', protected_path('vendor'));
    }

    /**
     * Update storage directory from stubs directory
     */
    protected static function updateStorage()
    {
        if (!file_exists(storage_path('app/protected/images'))) {
            mkdir(storage_path('app/protected/images'));
        }

        recursive_copy(__DIR__ . '/stubs/images', storage_path('app/protected/images'));
    }
}
