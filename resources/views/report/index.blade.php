<!DOCTYPE html>
<html lang="ru">
<head>
    @Vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <title>Нарушений.нет</title>
</head>
<body>
    <header>
        <div>
            <h1>НАРУШЕНИЙ.НЕТ</h1>
        </div>
        <div>
            <p>{{ auth()->user()->fio ?? 'ФИО пользователя' }}</p>
        </div>
    </header>

    <main>
        <a href="{{ route('reports.create') }}">создать заявление</a><br><br>
        <div>
            <span>Сортировка по дате создания: </span>
            <a href="{{ route('report.index', ['sort' => 'desc', 'status' => $status]) }}">сначала новые</a>
            <a href="{{ route('report.index', ['sort' => 'asc', 'status' => $status]) }}">сначала старые</a>
        </div>
         <div>
            <p>Фильтрация по статусу заявки</p>
            <ul>
                @foreach($statuses as $status)
                     <li>
                        <a href="{{ route('report.index', ['sort' => $sort, 'status' => $status->id])}}">
                            {{$status->name}}
                        </a>
                     </li>
                @endforeach
            </ul>
         </div>
        <div> 
            @foreach($reports as $report)
                <div> 
                    <span>{{ $report->created_at->format('d.m.Y') }}</span>
                    <div>
                        <a href="{{ route('reports.edit', $report->id) }}">Редактировать</a>
                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Удалить?')">Удалить</button>
                        </form>
                    </div>

                <h3>{{ $report->number }}</h3>
                <p>{{ $report->description }}</p>
                <p>{{ $report->created_at }}</p>
                <p>{{ $report->status->name }}</p>
            @endforeach
            {{ $reports->appends(request()->query())->links() }}
        </div> 
    </main>

</body>
</html>
