@extends('layouts.app')

@section('content')
<div class="store-show">
@php $check=0; @endphp


@isset($stores->name)

@php $check=1; @endphp
    <h1>Show for <h1>{{$stores->name}}
    <p class="type">Type - {{$stores->type}}</p>
    <form action="/show/{{ $stores->id }}" method="POST">
    @csrf
    @method('Delete')
    <button>Delete</button>
    </form>
@endisset
    
    
@if($check==0)
    <h1>NO DATA<h1>
@endif
</div>
<a href="/" class="back">Back</a>
@endsection
