@extends('layouts.main.app_blank')
@section('title')
    <?php
        __('messages.auth')
    ?>
@endsection
@section('head')
    <style type="text/css">
        .mdl-layout {
            align-items: center;
            justify-content: center;
        }
        .mdl-layout__content {
            padding: 24px;
            flex: none;
        }
    </style>
    <script type="application/javascript">
        $(document).ready(function () {
            $("button#back-button").click(function () {
                window.location.href = "{{url("/")}}";
            });
        });
    </script>
@endsection
@section('content')
    <div class="mdl-layout mdl-js-layout mdl-color--grey-100">
        <main class="mdl-layout__content">
            <div class="mdl-card mdl-shadow--6dp">
                <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                    <h2 class="mdl-card__title-text">@lang('messages.title')</h2>
                </div>
<!-- NukDokPlex's notice

Please, whoever you're, please don't try to break authorization from here, you can't do this.
I'm using CSRF protection, sessions are very strong protected. It can be hacked only Active
Directory's side. Also, this is strongly protected by database's side. If you're System
Administrator of College, don't try to understand anything, what's in view or controller.
That's working on true magic. It used about 20 HOURS OF MY LIFE and if you can't understand
anything here, don't try bro, that's not your fault. You're attended.

If you need any help with that, please, ask me on https://vk.com/nukdokplex. If I'm alive so I'll help.

{END_OF_TRANSMISSION} -->
                {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
                <div class="mdl-card__supporting-text">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        {!! Form::label("Имя пользователя","", $attribiutes = array("class" => "mdl-textfield__label")) !!}
                        {!! Form::text("username","", $attributes = array("class" => "mdl-textfield__input")) !!}
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        {!! Form::label("Пароль","", $attribiutes = array("class" => "mdl-textfield__label")) !!}
                        {!! Form::password("password", array("class" => "mdl-textfield__input")) !!}
                    </div>
                </div>

                <div class="mdl-card__actions mdl-card--border">
                    <div class="mdl-grid">
                        <button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"><i class="material-icons">exit_to_app</i> Войти</button>
                        <div class="mdl-layout-spacer"></div>
                        <button id="back-button" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"><i class="material-icons">arrow_back</i> Назад</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </main>
    </div>
@endsection

