@php

$type ??= 'text';
$class ??= null;
$name ??= '';
$table_id ??= '';
$value ??= '';
$label ??= ucfirst($name)


@endphp

<div @class(["mb-6", $class])>
    <label for="{{$name}}" class="block mb-2 text-sm font-medium text-gray-900 @error($name) border-red-600 focus:border-red-600 peer @enderror">{{$label}}</label>
    @if($type === 'textarea')
        <textarea id="{{$name}}" name="{{$name}}"rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error($name) text-red-600 border-red-600 @enderror">{{old($name, $value)}}</textarea>
    @else
    <input id="{{$name}}" name="{{$name}}" value="{{old($name, $value)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error($name) text-red-600 border-red-600 @enderror">
    @endif

    @error($name)
        <p class="mt-2 text-xs text-red-600">
            <span class="font-medium">{{$message}}</span>
        </p>
    @enderror
</div>
<!--
<div class="relative z-0 w-full mb-6 group">
    <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Your message</label>
    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
</div>
-->
