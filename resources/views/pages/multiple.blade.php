@extends('layouts.base')

<?php

$profileBuffer = $profileForm->render()->config(['frontend' => true]);
$addressBuffer = $addressForm->render()->config(['frontend' => true]);

// Wrap each input first
$profileBuffer->each(function($chunk){
    $chunk->wrap('<div class="input-wrapper">%s</div>');
});

$addressBuffer->each(function($chunk){
    $chunk->wrap('<div class="input-wrapper">%s</div>');
});

// Group specific inputs
$profileBuffer->group(['firstname', 'lastname'], function($chunk){
    $chunk->wrap('<div class="group-wrapper">%s</div>');
});

$addressBuffer->group(['city', 'street'])->each(function($chunk){
    $chunk->wrap('<div class="group-wrapper">%s</div>');
});

// Wrap rows
$profileBuffer->each(function($chunk){
    $chunk->wrap('<div class="form-row">%s</div>');
});

$addressBuffer->each(function($chunk){
    $chunk->wrap('<div class="form-row">%s</div>');
});

?>

@section('content')
    <div class="form-container" data-cmp="multiple-form">
        <div class="form-wrapper">
            {!! $profileBuffer !!}
        </div>
        <div class="form-wrapper">
            {!! $addressBuffer !!}
        </div>
    </div>
@stop