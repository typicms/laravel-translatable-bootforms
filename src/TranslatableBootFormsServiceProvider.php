<?php

declare(strict_types=1);

namespace TypiCMS\LaravelTranslatableBootForms;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use TypiCMS\LaravelTranslatableBootForms\Form\FormBuilder;

class TranslatableBootFormsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('translatable-bootforms.php'),
        ], 'typicms-config');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'transbootform');

        Blade::anonymousComponentNamespace('transbootform::components', 'transbootform');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'translatable-bootforms');

        // Override BootForm's form builder so model binding works between
        // BootForm & TranslatableBootForm. extend() is used instead of
        // singleton() because extenders survive subsequent rebindings of the
        // abstract — register() ordering across providers is not guaranteed.
        $this->app->extend('typicms.form', function ($formBuilder, Application $application): FormBuilder {
            if ($formBuilder instanceof FormBuilder) {
                return $formBuilder;
            }

            $locales = array_keys(config('typicms.locales', []));
            if ($locales === []) {
                $locales = config('typicms.locales');
            }

            $translatableFormBuilder = new FormBuilder;
            $translatableFormBuilder->setLocales($locales);
            $translatableFormBuilder->setErrorStore($application['typicms.form.errorstore']);
            $translatableFormBuilder->setOldInputProvider($application['typicms.form.oldinput']);
            $translatableFormBuilder->setToken($application['session.store']->token());

            return $translatableFormBuilder;
        });

        $this->app->singleton('translatable-bootform', function (Application $application): TranslatableBootForm {
            $translatableBootForm = new TranslatableBootForm($application['typicms.bootform']);
            $locales = array_keys(config('typicms.locales', []));
            if ($locales === []) {
                $locales = config('typicms.locales');
            }

            $translatableBootForm->locales($locales);

            return $translatableBootForm;
        });
    }
}
