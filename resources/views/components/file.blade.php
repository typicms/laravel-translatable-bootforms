@props(['label', 'name', 'value' => null])
{!! \TypiCMS\BootForms\ComponentSupport::apply(TranslatableBootForm::file($label, $name, $value), $attributes) !!}
