<!DOCTYPE html>
<html lang="ru">
<head>
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
                
            @endforeach

        </div> 
    </main>

</body>
</html>
