@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Edit your profile') }}</div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" enctype='multipart/form-data' method="post" novalidate>
                        {{csrf_field()}}

                        <div class="form-group">
                            <input type="text" id="first_name" name="first_name" placeholder="First name" class="form-control" value="{{old('first_name', $current_user->first_name)}}">
                            @error('first_name')
                              <span class="errormsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>

												<div class="form-group">
                            <input type="text" id="last_name" name="last_name" placeholder="Last name" class="form-control" value="{{old('last_name', $current_user->last_name)}}">
                            @error('last_name')
                              <span class="errormsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>

												<div class="form-group">
                            <input type="text" id="email" name="email" placeholder="E-mail address" class="form-control" value="{{old('email', $current_user->email)}}">
                            @error('email')
                              <span class="errormsg text-danger">{{ $message }}</span>
                            @enderror
                        </div>

												<div class="form-group">
													<textarea name="bio" id="bio" class="form-control" cols="30" rows="6">{{old('bio', $current_user->bio)}}</textarea>

                            @error('bio')
                              <span class="errormsg text-danger">{{ $message }}</span>
                            @enderror
												</div>

                        <label for="avatar" class="text-muted">Upload avatar</label>
												<div class="form-group d-flex">
													<div class="w-75 pr-1">
														<input type='file' name='avatar' id="avatar" class="form-control border-0 py-0 pl-0 file-upload-btn" value="{{$current_user->avatar}}">
														@if ($errors->has('avatar'))
																<span class="errormsg text-danger">{{ $errors->first('avatar') }}</span>
														@endif
													</div>

													<div class="w-25 position-relative" id="avatar-container">
														<img class="rounded-circle img-thumbnail avatar-preview" src="{{asset('images/avatars')}}/{{$current_user->avatar}}" alt="{{$current_user->first_name}} {{$current_user->first_name}}">
														<span class="avatar-trash">
                              @if($current_user->avatar !== 'default.png')
															  <a href="#" class="icon text-light" id="delete-avatar" data-uid="{{$current_user->id}}"><i class="fa fa-trash"></i></a>
                              @endif
                            </span>
													</div>
												</div>

                        <div class="form-group d-flex mb-0">
                            <div class="w-50 pr-1">
															<input type="submit" name="submit" value="Save" class="btn btn-block btn-primary">
														</div>
														<div class="w-50 pl-1">
															<a href="{{route('profile')}}" class="btn btn-block btn-primary">Cancel</a>
														</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
