<form method="post" action="{{ url('age/dashboard') }}">
    @csrf
    Age: <input type="text" name="age"><br>
    <input type="submit">
</form>
