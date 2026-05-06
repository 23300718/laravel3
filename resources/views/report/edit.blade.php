<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Редактировать заявление
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        <form method="POST" action="{{ route('reports.update', $report->id) }}">
            @csrf 
            @method('PUT')
            <div>
                <label>Регистрационный номер авто</label><br>
                <input type="text" name="number" value="{{ $report->number }}" required>
            </div>

            <br>

            <div>
                <label>Описание нарушения</label><br>
                <textarea name="description" rows="4" required>{{ $report->description }}</textarea>
            </div>

            <br>
            <button type="submit">Обновить</button>
        </form>

        <br>
        <a href="{{ route('report.index') }}">Назад к списку</a>
    </div>
</x-app-layout>
