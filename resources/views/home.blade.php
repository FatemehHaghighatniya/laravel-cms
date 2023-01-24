@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('داشبورد') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('شما وارد شده اید') }}
                    <br><a href="{{route('dashboard.index')}}">{{ __('ورود به پنل کاربری') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
