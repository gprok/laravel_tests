

<h1>{{ $member->name }}</h1>
<ol>
@foreach ($member->events as $event)
    <li>{{ $event->title }} <a href="{{ url('event/cancel/' . $event->id . '/' . $member->id) }}">x</a></li>
@endforeach
</ol>
