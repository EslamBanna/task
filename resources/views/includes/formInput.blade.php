<div class="container box-input">
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <form action="" method="">
                @csrf
                <input type="text" class="form-control" id="name" name="name" />
                <button id="save_user" class="btn btn-primary action" onclick="return fire()">Add</button>
            </form>
        </div>
    </div>
</div>
<input type="hidden" id="count" value="{{App\Models\User::count()}}">
