<x-site-layout title="Start a new Quest">

    @if($errors->any())
        <div class="bg-red-50 rounded p-2 text-red-500">
            {{ $errors->any() ? $errors : ''}}
        </div>
    @endif

    <form action="{{route('user.quests.store')}}" method="post" class="flex flex-col gap-4" enctype="multipart/form-data">
        @csrf
        
        <x-form-text label="Title" name="title" />
        <x-form-text label="Reward" name="reward" />

        <div>
            Todoes:<br/>
            @foreach(\App\Models\Activity::all() as $activity)
                <input name="activities[]" type="checkbox" id="act-{{$activity->id}}" value="{{$activity->id}}" />
                <label for="act-{$activity->id}}">{{$activity->name}}</label><br/>
            @endforeach
        </div>

        <label class="text-sm font-semibold" for="photo">Quest image</label>
        <input type="file" name="photo" id="photo"/>


        <div class="mt-4 flex justify">
            <button type="submit" class="p-1 bg-teal-500 text-white rounded">Create</button>
        </div>
    </form>

</x-site-layout>