<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            НАРУШЕНИЙ.НЕТ
        </h2>
    </x-slot>

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
                </div> 
            @endforeach
            {{ $reports->appends(request()->query())->links() }}
        </div> 
    </main>
</x-app-layout>
