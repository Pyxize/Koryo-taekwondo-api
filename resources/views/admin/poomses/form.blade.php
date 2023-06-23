@extends('admin.layout')

@section('title', $poomse->exists ? "Update poomse" : "Created poomse")

@section('content')

    <h1>@yield("title")</h1>

    <form action="{{route($poomse->exists ? 'admin.poomse.update' : 'admin.poomse.store', ['poomse' => $poomse]) }}" method="post">
        @csrf
        @method($poomse->exists ? 'put' : 'post')


        @include('shared.input', [ 'name' => 'codified fight', 'value' => $poomse->codified_fight])
        @include('shared.input', ['name' => 'name', 'value' => $poomse->name])
        @include('shared.select', ['name' => 'techniques', 'label' => 'Techniques', 'value' => $poomse->techniques()->pluck('id'), 'multiple' => true])

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            @if($poomse->exists)
                Update
            @else
                Create
            @endif
        </button>
    </form>

@endsection
