@props(['label', 'name', 'value' => null])
@php
    $control = TranslatableBootForm::inputGroup($label, $name, $value);
    if (isset($beforeAddon)) {
        $control->beforeAddon((string) $beforeAddon);
    }
    if (isset($afterAddon)) {
        $control->afterAddon((string) $afterAddon);
    }
@endphp
{!! \TypiCMS\BootForms\ComponentSupport::apply($control, $attributes) !!}
