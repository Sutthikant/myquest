<x-site-layout title='Welcome'>

    <h2 class="text-2xl font-bold">Welcome to MyQuest, Let's start your own quest!!!</h2>


    <div class='grid grid-2 gap-8'>
        @foreach($quests as $quest)
            <div class='mt-8 p-2 bg-white rounded'>
                <h3 class="font-bold">{{$quest->title}}</h3>
                <div> {{$quest->reward }}</div>
                <div> {{$quest->user->name }}</div>
            </div>
        @endforeach
    </div>
    
</x-site-layout>
