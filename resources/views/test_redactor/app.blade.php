@extends('layouts.main.app')

@section('title')
    Редактор Тестов НМК
@endsection

@section('title_in')
    Редактор Тестов НМК
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
        const responseObj = [
            @foreach($tests as $test)
            {
                "title": "{{$test->title}}",
                "owner": "{{\App\User::findOrFail($test->owner_id)->get()->first()->username}}",
                "created_at": "{{$test->created_at}}",
                "updated_at": "{{$test->updated_at}}",
                "edit" : "{{url("edit_tests/" .  $test->id)}}",
                "questions" : "{{url("edit_tests/" . $test->id . "/questions")}}"
            },
            @endforeach
        ];

        $(document).ready(function () {
            $('#table_tests').DataTable(
                {
                    language : datatables_lang,
                    data: responseObj,
                    columns : [
                        {data : "title"},
                        {data : "owner"},
                        {data : "created_at"},
                        {data : "updated_at"},
                        {
                            data : "edit",
                            render : function(data, type, row, meta){

                                if(type === 'display'){
                                    data = '<a href="' + data + '">Изменить</a>';
                                }

                                return data;
                            }
                        },
                        {
                            data : "questions",
                            render : function(data, type, row, meta){

                                if(type === 'display'){
                                    data = '<a href="' + data + '">Вопросы</a>';
                                }

                                return data;
                            }
                        },
                    ]
                }
            );
        });
    </script>
@endsection

@section('content')
    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>
        <div class="mdl-cell mdl-cell--10-col mdl-shadow--2dp article">
            <h3>Тесты</h3>
            <table id="table_tests" class="mdl-data-table dataTable" style="width:100%;">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Автор</th>
                    <th>Создан</th>
                    <th>Изменён</th>
                    <th>Изменить</th>
                    <th>Вопросы</th>
                </tr>
                </thead>
            </table>
            <div class="mdl-grid">
                <div class="mdl-layout-spacer"></div>
                <div class="mdl-cell mdl-cell--2-col">
                    <button onclick="window.location.href = '{{url("edit_tests/make_test")}}';" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style='width: 100%;'>
                        <i class="material-icons">add</i>
                    </button>
                </div>
                <div class="mdl-layout-spacer"></div>
            </div>
        </div>
        <div class="mdl-layout-spacer"></div>
    </div>
@endsection


