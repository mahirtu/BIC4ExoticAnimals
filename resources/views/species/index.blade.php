@extends('layouts.app')


@section('content')
<div class="content">
    <div class="block">
        <div class="container">
            <h1>List Species</h1>
        </div>


    </div>

    <species-list-component :all-species="{{$species}}"></species-list-component>
</div>


</section>
@endsection
