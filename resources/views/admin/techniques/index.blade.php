@extends('admin.layout')

@section('title', 'All techniques')

@section('content')
    <h1 class="text-3xl">@yield('title')</h1>

    <div class="flex flex-col">
        <div class="flex justify-end">
            <a
                class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none"
                href="{{route('admin.technique.create')}}">Create</a>
        </div>
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium">
                        <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Name</th>
                            <th scope="col" class="px-6 py-4">Descritpion</th>
                            <th scope="col" class="px-6 py-4">Created</th>
                            <th scope="col" class="px-6 py-4">Updated</th>
                            <th scope="col" class="px-6 py-4">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($techniques as $technique)
                                <tr class="border-b">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{$technique->id}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$technique->name}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$technique->description}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$technique->created_at}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$technique->updated_at}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="flex">
                                            <a
                                                class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none"
                                                href="{{route('admin.technique.edit', $technique)}}">Update</a>
                                            <form action="{{route('admin.technique.destroy', $technique)}}" method="post">
                                                @csrf
                                                @method("delete")
                                                <button
                                                    class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-6">
                        {{$techniques->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
