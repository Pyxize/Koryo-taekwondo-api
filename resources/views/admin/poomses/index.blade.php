@extends('admin.layout')

@section('title', 'All poomse')

@section('content')
    <h1 class="text-3xl">@yield('title')</h1>

    <div class="flex flex-col">
        <div class="flex justify-end">
            <a
                class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none"
                href="{{route('admin.poomse.create')}}">Create</a>
        </div>
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium">
                        <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">codified_fight</th>
                            <th scope="col" class="px-6 py-4">Name</th>
                            <th scope="col" class="px-6 py-4">Techniques</th>
                            <th scope="col" class="px-6 py-4">Created</th>
                            <th scope="col" class="px-6 py-4">Updated</th>
                            <th scope="col" class="px-6 py-4">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($poomses as $poomse)
                                <tr class="border-b">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{$poomse->id}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$poomse->codified_fight}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$poomse->name}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        @if(!$poomse->techniques->isEmpty())
                                            @foreach($poomse->techniques as $technique)
                                                <span class="bg-indigo-100 text-indigo-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">
                                                       {{$technique->name}}
                                                </span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$poomse->created_at}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$poomse->updated_at}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="flex">
                                            <a
                                                class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none"
                                                href="{{route('admin.poomse.edit', $poomse)}}">Update</a>
                                            <form action="{{route('admin.poomse.destroy', $poomse)}}" method="post">
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
                        {{$poomses->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
