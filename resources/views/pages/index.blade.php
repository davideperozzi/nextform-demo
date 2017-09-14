@extends('layouts.base')

<?php

$buffer = $form->render()->config(['frontend' => true]);

// Wrap each input first
$buffer->each(function($chunk){
    $chunk->wrap('<div class="input-wrapper">%s</div>');
});

$buffer->salutation->wrap('<div class="salutation-wrapper">%s</div>');
$buffer->salutation->each(function($chunk){
    switch ($chunk->node->getAttribute('value')) {
        case 'm':
            $chunk->wrap('<span>Male</span> %s');
            break;

        case 'f':
            $chunk->wrap('<span>Female</span> %s');
            break;
    }

    $chunk->wrap('<div class="radio-wrapper">%s</div>');
});

$buffer->colors->wrap('<span class="title">Favorite colors:</span> %s');
$buffer->colors->wrap('<div class="colors-wrapper">%s</div>');
$buffer->colors->each(function($chunk){
    $value = $chunk->node->getAttribute('value');

    $chunk->wrap('<span>' . ucfirst($value) . '</span> %s');
    $chunk->wrap('<div class="checkbox-wrapper">%s</div>');
});

// Group specific inputs
$buffer->group(['firstname', 'lastname']);
$buffer->group(['password', 'password-submit']);

// Wrap group inputs
$buffer->get([
    ['firstname', 'lastname'],
    ['password', 'password-submit']
])->each(function($chunk){
    $chunk->wrap('<div class="group-wrapper">%s</div>');
});

// Wrap rows
$buffer->each(function($chunk){
    $chunk->wrap('<div class="form-row">%s</div>');
});

?>

@section('content')
    <div class="form-container">
        <div class="form-wrapper" data-cmp="register-form">
            {!! $buffer !!}
        </div>
    </div>
@stop