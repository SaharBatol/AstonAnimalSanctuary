@extends('layouts.app')

@section('content')
    @if (Auth::user()->hasRole('admin'))
        <main class="sm:container sm:mx-auto sm:mt-10">
            <div class="md:w-1/3 md:mx-auto">

                <div class="bg-gray-200 w-64 px-4 py-4 border rounded border-gray-500">

                    <img src="{{ $animal -> img() }}" >

                    <h1 class="class=text-xl mb-2 mt-2">
                        Name: {{ $animal -> name }}
                    </h1>

                    <p class="mt-2">
                        breed: {{$animal -> breed}}
                    </p>

                    <div class="flex justify-center mt-4">
                        <a href="{{ $animal -> path.('/edit')}}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold mr-2 px-4 py-2 border border-gray-400 rounded shadow">
                            Edit
                        </a>

                        <form method="post" action="{{ $animal -> path }}">
                            @method ('DELETE')
                            @csrf
                            <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-4 py-2 border border-gray-400 rounded shadow">
                                <i>Delete</i>
                            </button>
                        </form>
                    </div>
                    </form>
                </div>
            </div>
        </main>
    @endif
@endsection
