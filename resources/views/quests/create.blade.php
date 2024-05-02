<x-site-layout title="Start a new Quest">

    @if($errors->any())
        <div class="bg-red-50 rounded p-2 text-red-500">
            {{ $errors->any() ? $errors : ''}}
        </div>
    @endif

    <form action="{{route('quests.store')}}" method="post" class="flex flex-col gap-4">
        @csrf
        
        <label for="title">
            Quest's Title:<br/>
            <input type="text" id="title" name="title"/>
        </label>

        <label for="reward">
            Reward:<br/>
            <input type="text" id="reward" name="reward"/>
        </label>

        <div class="mt-4 flex justify">
            <button type="submit" class="p-1 bg-teal-500 text-white rounded">Create</button>
        </div>
    </form>

</x-site-layout>