<x-site-layout title="{{$quest->title}}">
    <div>
        Created by: {{$quest->user->name}}<br/>
        Reward: {{$quest -> reward}}
    </div>
</x-site-layout>