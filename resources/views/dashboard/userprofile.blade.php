@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Edit your profile') }}</div>
                <div class="card-body">
                    <form action="{{ route('update') }}" enctype='multipart/form-data' method="post" novalidate>
                        {{csrf_field()}}

                        <div class="form-group">
                            <input type="text" id="first_name" name="first_name" placeholder="First name" class="form-control" value="{{old('first_name', $current_user->first_name)}}">
                            @if ($errors->has('first_name'))
                              <span class="errormsg text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>

												<div class="form-group">
                            <input type="text" id="last_name" name="last_name" placeholder="Last name" class="form-control" value="{{old('last_name', $current_user->last_name)}}">
                            @if ($errors->has('first_name'))
                              <span class="errormsg text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>

												<div class="form-group">
                            <input type="text" id="email" name="email" placeholder="E-mail address" class="form-control" value="{{old('email', $current_user->email)}}">
                            @if ($errors->has('email'))
                              <span class="errormsg text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

												<div class="form-group">
													<textarea name="bio" id="bio" class="form-control" cols="30" rows="6">{{old('bio', $current_user->bio)}}</textarea>

														@if ($errors->has('bio'))
                              <span class="errormsg text-danger">{{ $errors->first('bio') }}</span>
                            @endif
												</div>

                        <label for="avatar" class="text-muted">Upload avatar</label>
												<div class="form-group d-flex">
													<div class="w-75 pr-1">
														<input type='file' name='avatar' id="avatar" class="form-control border-0 py-0 pl-0 file-upload-btn" value="{{$current_user->avatar}}">
														@if ($errors->has('avatar'))
																<span class="errormsg text-danger">{{ $errors->first('avatar') }}</span>
														@endif
													</div>

													<div class="w-25">
														<img class="rounded-circle img-thumbnail avatar-preview" src="{{asset('images/avatars')}}/{{$current_user->avatar}}" alt="{{$current_user->first_name}} {{$current_user->first_name}}">
													</div>
												</div>

                        <div class="form-group mb-0">
                            <input type="submit" name="submit" value='Save' class='btn btn-block btn-primary'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
