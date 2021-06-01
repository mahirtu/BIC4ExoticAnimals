@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">

            <species-show-component :current-species="{{ $species }}" :current-animal="{{ $species->animals }}" >
            </species-show-component>
        </div>
    </section>
@endsection
