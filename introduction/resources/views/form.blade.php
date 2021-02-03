@extends("layout    ")

@section("body")

    <form action={{route('form.save')}} method = "post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name = "name" id = "name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="form-group">
            <input type="submit" value="Add Person">
        </div>
    </form>

@endsection