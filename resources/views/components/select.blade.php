@props(['label', 'name', 'options' => []])
{!! \TypiCMS\BootForms\ComponentSupport::apply(TranslatableBootForm::select($label, $name, $options), $attributes) !!}
