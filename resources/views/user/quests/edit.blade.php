<x-site-layout title="Edit Quest">

    @if($errors->any())
        <div class="bg-red-50 rounded p-2 text-red-500">
            {{ $errors->any() ? $errors : ''}}
        </div>
    @endif

    <form action="{{route('user.quests.update', ['quest' => $quest -> id])}}" method="post" class="flex flex-col gap-4">
        @csrf
        @method('PUT')

        <x-form-text label="Title" name="title" value="{{$quest->title}}"/>
        <x-form-text label="Reward" name="reward" value="{{$quest->reward}}"/>

        <div>
            Todoes:<br/>
            @foreach(\App\Models\Activity::all() as $activity)
                <input name="activities[]" type="checkbox" id="act-{{$activity->id}}" value="{{$activity->id}}" @checked($quest->todos->pluck('activity_id')->contains($activity->id))/>
                <label for="act-{$activity->id}}">{{$activity->name}}</label><br/>
            @endforeach
        </div>
        
        <div class="mt-4 flex justify">
            <button type="submit" class="p-1 bg-teal-500 text-white rounded">Update</button>
        </div>
    </form>

</x-site-layout>