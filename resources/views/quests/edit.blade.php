<x-site-layout title="Edit Quest">

    {{$quest}}

    <form action="{{route('quests.update', ['quest' => $quest -> id])}}" method="post" class="flex flex-col gap-4">
        @csrf
        @method('PUT')
        
        <label for="title">
            Quest's Title:<br/>
            <input type="text" id="title" name="title" value ="{{$quest -> title}}"/>
        </label>

        <label for="reward">
            Reward:<br/>
            <input type="text" id="reward" name="reward" value ="{{$quest -> reward}}"/>
        </label>

        <div class="mt-4 flex justify">
            <button type="submit" class="p-1 bg-teal-500 text-white rounded">Update</button>
        </div>
    </form>

</x-site-layout>