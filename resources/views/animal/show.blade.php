@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            @if(isset($animal->species))
            <animal-show-component :current-animal="{{ $animal }}" :current-species="{{ $animal->species}}" >
            </animal-show-component>
            @else
            <animal-show-component :current-animal="{{ $animal }}" :current-species="[]" >
            </animal-show-component>
            @endif

        </div>
    </section>
@endsection
