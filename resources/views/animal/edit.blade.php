@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            @if(isset($animal->species))
            <animal-edit-component :is-editable="true" :current-animal="{{$animal}}" :current-species="{{ $animal->species}}"></animal-edit-component>
            @else
            <animal-edit-component :is-editable="true" :current-animal="{{$animal}}" :current-species="[]"></animal-edit-component>
            @endif
        </div>
    </section>
@endsection
