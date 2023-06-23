@extends('admin.layout')

@section('title', $technique->exists ? "Update technique" : "Created technique")

@section('content')

    <h1>@yield("title")</h1>

    <form action="{{route($technique->exists ? 'admin.technique.update' : 'admin.technique.store', ['technique' => $technique]) }}" method="post">
        @csrf
        @method($technique->exists ? 'put' : 'post')

        @include('shared.input', ['name' => 'name', 'value' => $technique->name])
        @include('shared.input', ["type" => 'textarea',  'name' => 'description', 'value' => $technique->description])


        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            @if($technique->exists)
                Update
            @else
                Create
            @endif
        </button>
    </form>

@endsection
