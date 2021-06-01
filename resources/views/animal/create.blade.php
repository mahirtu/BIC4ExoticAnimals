@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <animal-edit-component :is-editable="false" ></animal-edit-component>
        </div>
    </section>
@endsection
