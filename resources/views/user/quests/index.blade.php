<x-site-layout title="List of all {{auth() -> user() -> name}}'s Quest">


    <div class="flex justify-end w-full mb-4">
        <a href="{{route('user.quests.create')}}" class="p-1 bg-teal-500 text-white rounded">Create new quest!!!</a>
    </div>

    @foreach($quests as $quest)
        <div class="bg-white p-1 mb-1 flex flex-row justify-between">
            <div class="flex">
                <h2 class="text-lg font-bold">{{$quest->title}}</h2>
            </div>
            <div class="flex gap-2 text-sm">
                    <a href="{{route('quests.show', ['quest' => $quest->id])}}" class="text-blue-500">Details</a>
                    <a href="{{route('quests.edit', ['quest' => $quest->id])}}" class="text-blue-500">Edit</a>
                    <form action="{{route('quests.destroy', ['quest' => $quest->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="text-blue-500">Delete</button>
                    </form>
            </div>
        </div>
    @endforeach
</x-site-layout>