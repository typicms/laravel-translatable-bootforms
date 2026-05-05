@props(['label', 'name', 'uncheckedValue' => null, 'inline' => false])
@if (! is_null($uncheckedValue))
    {!! TranslatableBootForm::hidden($name)->value($uncheckedValue) !!}
@endif
@php
    $control = $inline ? TranslatableBootForm::inlineCheckbox($label, $name) : TranslatableBootForm::checkbox($label, $name);
@endphp
{!! \TypiCMS\BootForms\ComponentSupport::apply($control, $attributes) !!}
