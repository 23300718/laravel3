@props(['sort', 'status'])

@php
    $allStatuses = \App\Models\Status::all();
@endphp

<div>
    <div>
        <span>Сортировка по дате создания: </span>
        <a href="{{ route('report.index', ['sort' => 'desc', 'status' => $status]) }}">сначала новые</a>
        <a href="{{ route('report.index', ['sort' => 'asc', 'status' => $status]) }}">сначала старые</a>
    </div>
    <div>
        <p>Фильтрация по статусу заявки</p>
        <ul>
            @foreach($allStatuses as $st)
                 <li>
                    <a href="{{ route('report.index', ['sort' => $sort, 'status' => $st->id]) }}">
                        {{ $st->name }}
                    </a>
                 </li>
            @endforeach
        </ul>
    </div>
</div>
