@props(['label', 'name'])
{!! \TypiCMS\BootForms\ComponentSupport::apply(TranslatableBootForm::password($label, $name), $attributes) !!}
