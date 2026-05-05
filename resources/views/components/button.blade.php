@props(['label', 'name' => null, 'type' => 'btn-secondary'])
{!! \TypiCMS\BootForms\ComponentSupport::apply(TranslatableBootForm::button($label, $name, $type), $attributes) !!}
