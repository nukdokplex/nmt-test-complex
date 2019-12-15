@extends('layouts.main.app')

@section('title')
    Редактор Тестов НМК
@endsection

@section('title_in')
    Редактор Тестов НМК
@stop

@section('head')
    <script type="application/javascript" src="{{url("/assets/js/jquery.tablednd.min.js")}}"></script>
    <script type="application/javascript">
        //the code below is JavaScript code with SPECIAL style "ShitJS". (C) NukDokPlex 2019
        //from hell with love
        //try to mind that if you can :)
        var i = 0;
        function onAddAnswerClick(identificator){
            var id = identificator.split('-', 3)[1];
            var count = $("div#answers-"+id).children().length;
            console.log("Add answer to #"+id);
            $("div#answers-"+id).append(
                '<div class="answer" id="answer-'+id+'-'+count+'">' +
                '<label for="answer-title-'+id+'-'+count+'">#' + (count+1) + ': </label>' +
                '<input type="text" class="answer-title" id="answer-title-'+id+'-'+count+'">' +
                '<input type="checkbox" class="answer-correct" id="answer-correct-'+id+'-'+count+'">' +
                '<label for="answer-correct-'+id+'-'+count+'">Правильный ответ?</label>' +
                '</div>'
            );
        }
        function onSubAnswerClick(identificator){
            var id = identificator.split('-', 3)[1];
            console.log("Sub answer from #"+id);
            $("div#answers-"+id+" div.answer:last-child").remove();
        }
        $(document).ready(function () {
            $("button#add-question").click(function () {
                console.log("Added question!");
                $('table.questions-list').append('' +
                    '<tr id="question-'+i+'" style="width: 100%"><td style="width: 100%">' +
                    '<div class="mdl-shadow--2dp questions" style="width: 100%"> ' +
                    '<label for="title-'+i+'">Текст вопроса: </label>' +
                    '<textarea class="question-title" type="text" rows= "3" id="title-'+i+'"></textarea><br>' +
                    '<button onclick="onAddAnswerClick(this.id);" id="button-'+i+'" class="add_answer-button">+</button> <button onclick="onSubAnswerClick(this.id);" id="button-'+i+'" class="sub_answer-button">-</button><br>' +
                    '<div class="answers" id="answers-'+i+'">' +
                    '' +
                    '</div> ' +
                    '</div>' +
                    '</td><td  class="material-icons dragHandle" style="float:right; cursor: move;">sort</td></tr>');
                i++;
                $("table.questions-list").tableDnD({
                    dragHandle: ".dragHandle"
                });
            });
            $("button#done").click(function () {
                var questions = [];
                $("div.questions").each(function (index) {
                    console.log("Processing question #"+(index+1)+"...");
                    var title = $("textarea.question-title", this).val();
                    var answers = [];
                    if (title.split(" ", 3).length !== 1 || title !== ""){

                        $("div.answer", this).each(function (index) {
                            console.log("Processing answer #"+(index+1)+"...");
                            var answer = {
                                title: $("input[type=text].answer-title", this).val(),
                                correct: false
                            };
                            if ($("input[type=checkbox].answer-correct", this).attr("checked")){
                                answer.correct = true;
                            }
                            if (answer.title.split(" ", 3).length !== 1 || answer.title !== ""){
                                answers.push(answer);
                            }
                        });
                        if (answers.length !== 0) {
                            questions.push({
                                title: title,
                                answers: answers
                            });
                        }
                    }
                });
                questions = {questions: questions};
            });
        });
    </script>
    <style type="text/css">

    </style>
@endsection

@section('content')
    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>
        <div class="mdl-cell mdl-cell--10-col mdl-shadow--2dp article">
            <h3>Редактирование вопросов теста {{$test->title}} (#{{$test->id}})</h3>
            @if($questions->answers == null)
                <h5>Нет данных о вопросах в БД: cоздание...</h5>
                <table class="questions-list">
                    <tbody style="width: 100%;">

                    </tbody>
                </table>
            @else

            @endif
            <div class="mdl-grid">
                <div class="mdl-layout-spacer"></div>
                <div class="mdl-cell mdl-cell--2-col">
                    <button id="add-question" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style='width: 100%;'>
                        <i class="material-icons">add</i>
                    </button>
                </div>
                <div class="mdl-cell mdl-cell--1-col"></div>
                <div class="mdl-cell mdl-cell--2-col">
                    <button id="done" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" style='width: 100%;'>
                        <i class="material-icons">done</i>
                    </button>
                </div>
                <div class="mdl-layout-spacer"></div>
            </div>
            <p>Номер вопроса указывать не требуется. Вы можете менять порядок вопросов, используя иконку справа. Просто зажмите и перетаскивайте левой кнопкой мыши.</p>
        </div>
        <div class="mdl-layout-spacer"></div>
    </div>
@endsection


