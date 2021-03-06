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

                        <div class="form-group with-floating-label">
                          <input type="text" id="username" name="username" placeholder="Username" class="form-control @error('username') is-invalid @enderror" value="{{old('username', $current_user->username)}}">
                          <label for="username" class="text-muted">Username</label>
                          @error('username')
                            <span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
															</span>
                          @enderror
                      </div>

                        <div class="form-group with-floating-label">
                            <input type="text" id="first_name" name="first_name" placeholder="First name" class="form-control @error('first_name') is-invalid @enderror" value="{{old('first_name', $current_user->first_name)}}">
                            <label for="first_name" class="text-muted">First name</label>
                            @error('first_name')
                              <span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
															</span>
                            @enderror
                        </div>

												<div class="form-group with-floating-label">
                            <input type="text" id="last_name" name="last_name" placeholder="Your last name" class="form-control @error('last_name') is-invalid @enderror" value="{{old('last_name', $current_user->last_name)}}">
                            <label for="last_name" class="text-muted">Last name</label>
                            @error('last_name')
                              <span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
															</span>
                            @enderror
                        </div>

												<div class="form-group with-floating-label">
                            <input type="text" id="email" name="email" placeholder="Email address" class="form-control @error('email') is-invalid @enderror" value="{{old('email', $current_user->email)}}">
                            <label for="email" class="text-muted">Email address</label>
                            @error('email')
                              <span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
															</span>
                            @enderror
                        </div>

												<div class="form-group with-floating-label">
													<textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" placeholder="Bio" cols="30" rows="6">{{old('bio', $current_user->bio)}}</textarea>
                          <label for="bio" class="text-muted">Bio</label>    
                          @error('bio')
                            <span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
															</span>
                          @enderror
												</div>

                        <label for="avatar" class="text-muted">Upload avatar</label>
												<div class="form-group d-flex">
													<div class="w-75 pr-1">
														<input type='file' name='avatar' id="avatar" class="form-control border-0 py-0 pl-0 file-upload-btn" value="{{$current_user->avatar}}">
														@if ($errors->has('avatar'))
																<span class="invalid-feedback" role="alert">{{ $errors->first('avatar') }}</span>
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
