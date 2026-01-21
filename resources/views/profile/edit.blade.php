@extends('layout.master')

@section('content')
<div class="container" style="margin-top:20px;">
    <h2 class="text-center" style="margin-bottom:30px;">{{ __('Profile') }}</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card mb-4" style="margin-bottom: 20px;">
                <div class="card-header">{{ __('Profile Information') }}</div>
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card mb-4" style="margin-bottom: 20px;">
                <div class="card-header">{{ __('Update Password') }}</div>
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card mb-4" style="margin-bottom: 20px;">
                <div class="card-header text-danger">{{ __('Delete Account') }}</div>
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</div>
@stop