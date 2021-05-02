@extends ('layouts.app')

@section ('content')
    <main class="flex sm:container sm:mx-auto sm:mt-10">
        <div class="inline w-full sm:px-6">
            <form method="post" action="/animal/">
                @csrf
                <div class="flex flex-wrap">
                    <div class="w-1/3">
                        <label class="block mb-2" for="name">
                            Name
                        </label>

                        <input type class="block w-3/5 @error ('name') border border-red-500 @enderror"
                               type="text" name="name" data-lpignore="true"
                               autocomplete="off" placeholder="e.g. Snickers" />

                        @error ('name')
                        <div class="alert-message">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="w-1/2">
                        <label class="block mb-2" for="breed">
                            Breed
                        </label>
                        <input class="block w-2/5 @error ('breed') border border-red-500 @enderror"
                               type="text" name="breed" data-lpignore="true"
                               autocomplete="off" placeholder="e.g. Bulldog" />

                        @error ('breed')
                        <div class="alert-message">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap mt-8">
                    <div class="w-full">
                        <button type="submit" class="mr-2 hover:bg-gray-300 text-gray-800 py-2 px-4 border border-gray-400 rounded shadow">
                            Create
                        </button>
                        <a href="/">
                            <button type="button" class="hover:bg-gray-300 text-gray-800 py-2 px-4 border border-gray-400 rounded shadow">
                                Cancel
                            </button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
