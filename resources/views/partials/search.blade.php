<div class="flex items-center mb-4">
    <div class="flex-auto lg:w-2/3">
        <form action="" method="POST">
            {{ csrf_field() }}
            <input id="search" class="transition-colors duration-100 ease-in-out focus:outline-0 border
       border-transparent focus:bg-white focus:border-gray-300 placeholder-gray-600 rounded-lg bg-gray-200
       p-3 block w-full appearance-none leading-normal ds-input" type="text" placeholder="Search the listings"
                   autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false"
                   aria-label="search input" dir="auto" name="term">
        </form>
        @if(isset($term))
            <p class="text-sm text-gray-500 mt-2 px-2">Results for: {{ $term ?? ''}}
                <a class="text-blue-300 px-4" href="{{ route('home') }}">remove</a></p>
        @endif
    </div>
</div>


