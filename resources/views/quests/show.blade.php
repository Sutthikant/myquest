<x-site-layout title="{{$quest->title}}">

    @if(session('success_message') !== null)
        <div class="bg-green-50 text-green-500 p-2 rounded flex">
            {{session('success_message')}}
        </div>
    @endif

    <div>
        Created by: {{$quest->user->name}}<br/>
        Reward: {{$quest -> reward}}
    </div>

</x-site-layout>