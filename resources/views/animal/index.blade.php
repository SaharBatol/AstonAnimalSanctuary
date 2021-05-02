@extends('layouts.app')

@section('content')
    <main class="flex sm:container sm:mx-auto sm:mt-10">
        <div class="inline sm:px-6">
            <section class="w-36 break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
                <header class="font-semibold bg-gray-200 text-gray-700 py-4 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Adoptions
                </header>
                <div class="w-full p-6">
                    <a href="{{ url('/') }}">
                        <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-3 py-2 border border-gray-400 rounded shadow">
                            Available Adoptions
                        </button>
                    </a>
                    <a href="{{ url('/home') }}">
                        <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold mt-2 px-4 py-2 border border-gray-400 rounded shadow">
                            Adoption Requests
                        </button>
                    </a>
                    @if (Auth::user()->hasRole('admin'))
                        <a href="{{ url('/animal/') }}">
                            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold mt-2 px-6 py-2 border border-gray-400 rounded shadow">
                                Add Animal
                            </button>
                        </a>
                    @endif
                </div>
            </section>
        </div>
        <div class="inline w-full sm:px-6">
            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Adoption Animals
                </header>
                <div class="w-full p-6">
                    <ul>
                        @foreach($animals as $a)
                            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg mt-4">

                                <header class="font-semibold bg-gray-200 text-gray-700 py-2 px-3 sm:py-2 sm:px-3 sm:rounded-t-md">
                                    {{$a -> breed}}
                                </header>

                                <div class="flex justify-between w-full p-4">
                                    <img class="flex-start object-fill h-24 w-36" src="{{ $a -> img() }}">

                                    <a class="content-center text-center text-black font-bold text-xl ml-4 mb-2 leading-tight">
                                        Name: {{ $a -> name }}
                                    </a>

                                    <a class="justify-end text-right text-gray-700 ml-4 mb-2">
                                        Request Adoption
                                    </a>

                                    @if (Auth::user()->hasRole('admin'))
                                        <a href="{{ $a -> path }}">
                                            <button class="flex bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 py-2 border border-gray-400 rounded shadow">
                                                Edit
                                            </button>
                                        </a>
                                    @endif
                                </div>
                            </section>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>
    </main>
@endsection

