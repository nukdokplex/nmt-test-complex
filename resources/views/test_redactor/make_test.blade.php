@extends('layouts.main.app')

@section('title')
    Редактор Тестов НМК
@endsection

@section('title_in')
    Редактор Тестов НМК
@stop

@section('head')

@endsection

@section('content')
    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>
        <div class="mdl-cell mdl-cell--10-col mdl-shadow--2dp article">
            {!! Form::open(array("url" => url()->current(), "method" => "put", "autocomplete" => "off")) !!}

            <h3>Создание теста</h3>

            <div class="mdl-grid">
                <div class="mdl-cell--3-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    {!! Form::label("title", "Название теста", array("class" => "mdl-textfield__label")) !!}
                    {!! Form::text("title", null, $options = array("class" => "mdl-textfield__input")) !!}
                </div>
                <div class="mdl-cell--1-col"></div>
                <div class="mdl-cell--3-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                    {!! Form::label("subject_title", "Дисциплина", array("class" => "mdl-textfield__label")) !!}
                    {!! Form::text("subject_title", null, array("class" => "mdl-textfield__input", "readonly")) !!}
                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                    {!! Form::hidden("subject") !!}
                    <ul for="subject" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                        @foreach(\App\Models\ComplexSubject::all() as $subject)
                            <li class="mdl-menu__item" data-val="{{$subject->id}}">{{$subject->title}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="mdl-cell--1-col"></div>
                <div class="mdl-cell--3-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    {!! Form::label("time_to_pass", "Время на прохождение (в минутах)", array("class" => "mdl-textfield__label")) !!}
                    {!! Form::text("time_to_pass", null, $options = array("class" => "mdl-textfield__input", "pattern" => "-?[0-9]*(\.[0-9]+)?")) !!}
                    <span class="mdl-textfield__error">Введите число</span>
                </div>
            </div><br>

            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="is_randomized">
                {!! Form::checkbox("is_randomized", 1, false, array("class" => "mdl-switch__input", "id" => "is_randomized")) !!}
                <span class="mdl-switch__label">Перемешать вопросы</span>
            </label>
            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="can_pass">
                {!! Form::checkbox("can_pass", 1, false, array("class" => "mdl-switch__input", "id" => "can_pass")) !!}
                <span class="mdl-switch__label">Может быть пройден</span>
            </label>
            <br>

            <div class="mdl-grid">
                <div class="mdl-layout-spacer"></div>
                <div class="mdl-cell--2-col">
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="margin-top: 50px; width: 100%;">
                        <i class="material-icons">done</i> Создать
                    </button>
                </div>
                <div class="mdl-layout-spacer"></div>
            </div>

            <div class="mdl-grid">
                <div class="mdl-layout-spacer"></div>
                <div class="mdl-cell--6-col">
                    <h4 style="color: red">
                        {{ $errors->first() }}
                    </h4>
                </div>
                <div class="mdl-layout-spacer"></div>
            </div>
            <!-- Colored raised button -->


            {!! Form::close() !!}
        </div>
        <div class="mdl-layout-spacer"></div>
    </div>
@endsection


