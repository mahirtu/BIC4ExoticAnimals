@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <section class="section">
                <div class="container">
                    @if(isset($species->animals))
                    <species-edit-component :is-editable="true" :current-animals="{{$species->animals}}" :current-species="{{ $species}}"></species-edit-component>
                    @else
                    <species-edit-component :is-editable="true" :current-animals="[]" :current-species="{{ $species}}"></species-edit-component>
                    @endif


                </div>
            </section>
        </div>
    </section>
@endsection
