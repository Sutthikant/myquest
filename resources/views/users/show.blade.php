<x-site-layout title="{{$user->name}}'s Quests">

    <div class="grid grid-cols-2 gap-8">
        @foreach($user->quest as $quest)

            <x-article-display-card :quest="$quest"/>

        @endforeach
    </div>


    <div class="w-full text-center mt-6">
        <a class="p-2 bg-pink-500 text-white hover:bg-pink-700 rounded text-sm uppercase" href="/users">Check out the other users</a>
    </div>


</x-site-layout>