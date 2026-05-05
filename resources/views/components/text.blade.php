@props(['label', 'name', 'value' => null])
{!! \TypiCMS\BootForms\ComponentSupport::apply(TranslatableBootForm::text($label, $name, $value), $attributes) !!}
