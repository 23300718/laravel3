<x-app-layout>
    <x-slot name="header">
        
    </x-slot>

    <main>
        <a href="{{ route('reports.create') }}">создать заявление</a><br><br>

        <x-filter :sort="$sort" :status="$status"></x-filter>

        <div> 
            @foreach($reports as $report)
                <div> 
                    <span>{{ \Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y H:i') }}</span>
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
                    
                    @isset($report->path_img)
                        <img src="{{ Storage::url($report->path_img) }}" class="contact-block__img" alt="">
                    @endisset
                    
                    <p>{{ \Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y H:i') }}</p>
                    
                    <x-status :type="$report->status->id">
                        {{ $report->status->name }}
                    </x-status>
                </div> 
            @endforeach
            {{ $reports->appends(request()->query())->links() }}
        </div> 
    </main>
</x-app-layout>
