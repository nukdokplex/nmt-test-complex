@extends('layouts.main.app')

@section('title')
    <?php
    echo __('messages.title')
    ?>
@endsection

@section('title_in')
    <?php
    echo __('messages.title')
    ?>
@stop

@section('head')
    <style type="text/css">
        .welcome-card{
            width: 512px;
        }
        .welcome-card > .mdl-card__title{
            color: #fff;
            height: 176px;
            background: url("{{url('/assets/images/welcome-image.jpg')}}") center / cover;
        }
    </style>
    <script type="application/javascript">

    </script>
@endsection

@section('content')
    @csrf()
<div class="mdl-grid">
    <div class="mdl-layout-spacer"></div>
        <div class="welcome-card mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">@lang('messages.welcome')</h2>
            </div>
            <div class="mdl-card__supporting-text">
                @if( Auth::check())
                    @lang('messages.logged_in')
                @else
                    @lang('messages.not_logged_in')
                @endif

            </div>
            @if( !Auth::check())
                <div class="mdl-card__actions mdl-card--border">
                    <a id="login-button" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="{{url("login")}}">
                        @lang('messages.login')
                    </a>
                </div>
            @endif
        </div>
    <div class="mdl-layout-spacer"></div>
</div>
@endsection
