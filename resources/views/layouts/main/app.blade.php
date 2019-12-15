<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <script type="application/javascript">
        const datatables_lang = {
            "decimal":        "",
            "emptyTable":     "Нет записей",
            "info":           "Показаны записи с _START_ по _END_ из _TOTAL_",
            "infoEmpty":      "Показаны записи с 0 по 0 из 0",
            "infoFiltered":   "(отфильтровано из _MAX_ записей)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Показать _MENU_ записей",
            "loadingRecords": "Загрузка...",
            "processing":     "Обработка...",
            "search":         "Поиск:",
            "zeroRecords":    "Записи не найдены",
            "paginate": {
                "first":      "Первая",
                "last":       "Последняя",
                "next":       "Следующая",
                "previous":   "Последняя"
            },
            "aria": {
                "sortAscending":  ": нажмите для сортировки по возрастанию",
                "sortDescending": ": нажмите для сортировки по убыванию"
            }
        }
    </script>
    <meta charset="UTF-8">
    <title>@yield("title")</title>
    @include('layouts.partials.requirements')
    @include('layouts.partials.dynamic_styles')
    @yield("head")
</head>
<body>
<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">@yield("title_in", "Тестовый Комплекс НМК")</span>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
            <nav class="mdl-navigation">
                @if( Auth::check())
                    <a class="mdl-navigation__link" href="{{url("logout")}}">{{Auth::user()->username}} (выйти)</a>
                @else
                    <a class="mdl-navigation__link" href="{{url("login")}}">Войти</a>
                @endif
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Меню</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="#">Тесты</a>
            <a class="mdl-navigation__link" href="{{url("edit_tests")}}">Редактор тестов</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">
            @yield('content', '<h1>Нет контента. Возможно, это ошибка...</h1>')
        </div>
    </main>
    @yield('after_content')
</div>
</body>
</html>
