@extends('layouts.app')

@section('main')
<div class="container">
    <form action="{{route('update_territory')}}" method="post">
        @csrf
        @method('put')
    </form>
</div>
@endsection
