@extends('layouts.app')


@section('content')
    <section>
        <div class="content">
            <div class="block">
        <div class="container">
            <h1>List animal</h1>
        </div>
            </div>
            <animal-list-component :all-animals="{{$animals}}"></animal-list-component>
        </div>
    </section>
@endsection
