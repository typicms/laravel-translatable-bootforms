@props(['name', 'value' => null])
{!! TranslatableBootForm::hidden($name)->value($value) !!}
