<?php

namespace KrepyshSpec\LangGenerator;

use ElementaryFramework\FireFS\FireFS;
use ElementaryFramework\FireFS\Watcher\FileSystemWatcher;
use Illuminate\Support\ServiceProvider;
use KrepyshSpec\LangGenerator\Console\Commands\Translation;

class TranslationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Translation::class
            ]);
        }
        $this->publishes([
            __DIR__ . '/resources/js/translations' => resource_path('js/translations')
        ]);
    }

    public function register()
    {
        $this->app->singleton('VueTranslation', function () {
            return new LaravelVueTranslation(new LaravelTranslationFileHelper());
        });
        $this->app->bind('watcher', function () {
            $fireFS = new FireFS();
            $watcher = new FileSystemWatcher($fireFS);
            return $watcher;
        });
    }
}
