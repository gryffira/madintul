@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="margin: 50px auto 20px; border-radius: 0px; background: rgba(255, 255, 255, 0.9)">
                <div class="card-header"style=" background-color: #fff; font-weight: bold; font-family: Oswald, sans-serif"><a href="{{ route('landpage') }}" style="color: black;">MADINATUL QUR'AN</a></div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
