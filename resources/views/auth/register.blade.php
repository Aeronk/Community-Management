@extends('layout')
@section('header')
@parent
@endsection


@section('sidebar')
@parent
@endsection

@section('content')
<div class="am-content">
  <div class="main-content">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus style="border-radius: 10px;">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required  style="border-radius: 10px;">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" placeholder="+263 xxx xxx xxx" required  style="border-radius: 10px;">

                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="denomination_id" class="col-md-4 col-form-label text-md-right">{{ __('Denomination') }}</label>

                            <div class="col-md-6">
                               
                                <select class="form-control" id="denomination" class="form-control{{ $errors->has('denomination_id') ? ' is-invalid' : '' }}" name="denomination_id" value="{{ old('denomination_id') }}" required  style="border-radius: 10px;">
                                    <option>Please Select</option>
                                     @foreach($denominations as $denomination)
                                    <option value="{{$denomination->id}}">{{$denomination->name}}</option>
                                    @endforeach

                                </select>

                                @if ($errors->has('denomination_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('denomination_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="province_id" class="col-md-4 col-form-label text-md-right">{{ __('Province') }}</label>

                            <div class="col-md-6">
                               
                                <select class="form-control" id="ministry" class="form-control{{ $errors->has('province_id') ? ' is-invalid' : '' }}" name="province_id" value="{{ old('province_id') }}" required  style="border-radius: 10px;">
                                    <option>Please Select</option>
                                     @foreach($provinces as $province)
                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                    @endforeach

                                </select>

                                @if ($errors->has('province_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('province_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Zone') }}</label>

                            <div class="col-md-6">
                               
                                <select class="form-control" id="region" class="form-control{{ $errors->has('region_id') ? ' is-invalid' : '' }}" name="region_id" value="{{ old('region_id') }}" required  style="border-radius: 10px;">
                                    <option>Please Select</option>
                                     @foreach($regions as $region)
                                    <option value="{{$region->id}}">{{$region->name}}</option>
                                    @endforeach

                                </select>

                                @if ($errors->has('region_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('region_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="user_level" class="col-md-4 col-form-label text-md-right">{{ __('User Level') }}</label>

                            <div class="col-md-6">
                               
                                <select class="form-control" id="user_level" class="form-control" name="user_level" value="{{ old('user_level') }}" required>
                                    <option>Please Select</option>
                                     @foreach($userlevels as $userlevel)
                                    <option value="{{$userlevel->id}}">{{$userlevel->name}}</option>
                                    @endforeach

                                </select>

                                @if ($errors->has('user_level'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('user_level') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

@section('footer')
@parent

@endsection


@section('page-scripts')
  @include('partials.flash-swal')
@endsection