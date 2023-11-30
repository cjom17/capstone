<!-- resources/views/confirm-delete-users.blade.php -->

<form action="{{ url('/delete-all-users') }}" method="post">
    @csrf
    <label for="pin">Enter PIN to confirm:</label>
    <input type="text" name="pin" id="pin">
    <button type="submit">Delete All Users</button>
</form>
