@extends('layouts.app')

@section('content')


        <div class="relative">

            <img src="{{ asset('images/' . $picture) }}" width="{{ $positions['width'] }}px" />

        </div>



@endsection
