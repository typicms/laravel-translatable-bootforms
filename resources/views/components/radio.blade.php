@props(['label', 'name', 'value' => null, 'inline' => false])
@php
    $control = $inline ? TranslatableBootForm::inlineRadio($label, $name, $value) : TranslatableBootForm::radio($label, $name, $value);
@endphp
{!! \TypiCMS\BootForms\ComponentSupport::apply($control, $attributes) !!}
