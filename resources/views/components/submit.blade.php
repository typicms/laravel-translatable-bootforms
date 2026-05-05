@props(['value' => 'Submit', 'type' => 'btn-primary'])
{!! \TypiCMS\BootForms\ComponentSupport::apply(TranslatableBootForm::submit($value, $type), $attributes) !!}
