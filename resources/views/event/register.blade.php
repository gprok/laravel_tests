
<h1>Register</h1>
<form method="post" action="{{ url('event/do/register') }}">
    @csrf
    <select name="member">
    @foreach($members as $member)
        <option value="{{ $member->id }}">{{ $member->name }}</option>
    @endforeach
    </select>

    <select name="event">
        @foreach($events as $event)
            <option value="{{ $event->id }}">{{ $event->title }}</option>
        @endforeach
    </select>
    <button type="submit">Submit</button>
</form>

