@props(['label', 'name', 'value' => null])
{!! \TypiCMS\BootForms\ComponentSupport::apply(TranslatableBootForm::email($label, $name, $value), $attributes) !!}
