<x-app-layout>
    <x-slot name="header">
        
    </x-slot>

    <main>
        <a href="{{ route('reports.create') }}">создать заявление</a><br><br>

        <x-filter :sort="$sort" :status="$status"></x-filter>

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
                    
                    <x-status :type="$report->status->id">
                        {{ $report->status->name }}
                    </x-status>
                </div> 
            @endforeach
            {{ $reports->appends(request()->query())->links() }}
        </div> 
    </main>
</x-app-layout>
