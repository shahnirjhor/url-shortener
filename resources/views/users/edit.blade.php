@extends('layouts.layout')

@section('one_page_css')
    <link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">@lang('User List')</a></li>
                    <li class="breadcrumb-item active">@lang('Edit User')</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>@lang('Edit User')</h3>
            </div>
            <form class="form-material form-horizontal" action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12 col-form-label"><h4>@lang('Name') <b class="ambitious-crimson">*</b></h4></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input class="form-control ambitious-form-loading @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name',$user->name) }}" type="text" placeholder="@lang('Type Your Name Here')" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12 col-form-label"><h4>@lang('Email') <b class="ambitious-crimson">*</b></h4></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                    </div>
                                    <input class="form-control ambitious-form-loading @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', $user->email) }}" type="email" placeholder="@lang('Type Your Email Here')" required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12 col-form-label"><h4>@lang('Password')</h4></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input class="form-control ambitious-form-loading  @error('password') is-invalid @enderror" name="password" id="password" type="password" placeholder="@lang('Type Your Password Here')">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <small id="name" class="form-text text-muted">@lang('Leave Blank For Remain Unchanged')</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12 col-form-label"><h4>@lang('Confirm Password')</h4></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
                                    </div>
                                    <input class="form-control ambitious-form-loading @error('password_confirmation') is-invalid @enderror" name="confirm_password" id="confirm_password" type="password" placeholder="@lang('Type Your Confirm Password Here')">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <small id="name" class="form-text text-muted">@lang('Leave Blank For Remain Unchanged')</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12 col-form-label"><h4>@lang('User For')</h4></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                                    </div>
                                    <select class="form-control ambitious-form-loading @error('role_for') is-invalid @enderror" name="role_for" id="role_for">
                                        <option value="0" {{ old('role_for', $roleFor->role_for) == 0 ? 'selected' : '' }} >@lang('System User')</option>
                                        <option value="1" {{ old('role_for', $roleFor->role_for) == 1 ? 'selected' : '' }} >@lang('General User')</option>
                                    </select>
                                    @error('role_for')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12 col-form-label"><h4>@lang('Phone')</h4></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input class="form-control ambitious-form-loading @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone',$user->phone) }}" type="text" placeholder="@lang('Type Phone Number Here')">
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="staff_block">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12 col-form-label"><h4>@lang('Staff Role')</h4></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                        </div>
                                        <select class="form-control ambitious-form-loading" name="staff_roles" id="staff_roles">
                                            @foreach($staffRoles as $key => $role)
                                                <option value="{{$key}}" {{ old('staff_roles', $roleFor->name) == $key ? 'selected' : ''  }} >{{$role}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="user_block">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="col-md-12 col-form-label"><h4>@lang('User Role')</h4></label>
                                <div class="col-md-12">
                                    <select class="form-control ambitious-form-loading" name="user_roles" id="user_roles">
                                        @foreach($userRoles as $key => $role)
                                            <option value="{{$key}}" {{ old('user_roles', $roleFor->name) == $key ? 'selected' : '' }}>{{$role}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="col-md-12 col-form-label"><h4>@lang('Photo')</h4></label>
                            <div class="col-md-12">
                                <input id="photo" class="dropify" name="photo" value="{{ old('photo') }}" type="file" data-allowed-file-extensions="png jpg jpeg" data-max-file-size="2024K" />
                                <small id="name" class="form-text text-muted">@lang('Leave Blank For Remain Unchanged')</small>
                                <p>Max Size: 2MB, Allowed Format: png, jpg, jpeg</p>
                            </div>
                            @if ($errors->has('photo'))
                                <div class="error ambitious-red">{{ $errors->first('photo') }}</div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label class="col-md-12 col-form-label"><h4>@lang('Address')</h4></label>
                            <div class="col-md-12">
                                <div id="edit_input_address" style="min-height: 55px;">
                                </div>
                                <input type="hidden" name="address" id="address" value="{{ old('address',$user->address) }}">
                            </div>
                            @if ($errors->has('address'))
                                {{ Session::flash('error',$errors->first('address')) }}
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12 col-form-label"><h4>@lang('Status')</h4></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-bell"></i></span>
                                    </div>
                                    <select class="form-control ambitious-form-loading @error('status') is-invalid @enderror" required="required" name="status" id="status">
                                        <option value="1" {{ old('status', $user->status) == 1 ? 'selected' : ''  }}>@lang('Active')</option>
                                        <option value="0" {{ old('status', $user->status) == 0 ? 'selected' : ''  }}>@lang('Inactive')</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="@lang('Update')" class="btn btn-outline btn-info btn-lg"/>
                            <a href="{{ route('users.index') }}" class="btn btn-outline btn-secondary btn-lg float-right">@lang('Cancel')</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('script.users.edit.js')

@endsection
