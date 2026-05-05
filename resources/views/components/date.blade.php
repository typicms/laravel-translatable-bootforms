@props(['label', 'name', 'value' => null])
{!! \TypiCMS\BootForms\ComponentSupport::apply(TranslatableBootForm::date($label, $name, $value), $attributes) !!}
