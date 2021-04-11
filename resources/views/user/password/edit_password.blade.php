@extends('user.user_master')
@section('user')

<div style="padding: 20px;">
    <div class="col-md-6">
        <h3>Change Password</h3>
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Current Password</label>
                <input type="password" id="current_password" name="oldpassword" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">New Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">更新</button>
        </form>

    </div>
</div>

@endsection