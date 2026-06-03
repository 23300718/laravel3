<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Административная панель</h1>

                    <div style="overflow-x: auto; width: 100%; -webkit-overflow-scrolling: touch;">
                        <table class="bg-white border border-gray-200" style="min-width: 800px; width: 100%;">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 border">ФИО</th>
                                    <th class="px-4 py-2 border">Текст заявления</th>
                                    <th class="px-4 py-2 border">Номер автомобиля</th>
                                    <th class="px-4 py-2 border">Статус</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $report)
                                <tr>
                                    <td class="px-4 py-2 border">
                                        {{ $report->user->lastname ?? '' }}
                                        {{ $report->user->name ?? '' }}
                                        {{ $report->user->middlename ?? '' }}
                                    </td>
                                    <td class="px-4 py-2 border">{{ Str::limit($report->description, 100) }}</td>
                                    <td class="px-4 py-2 border">{{ $report->number }}</td>
                                    <td class="px-4 py-2 border">
                                        @if($report->status_id == 1)
                                            <form class="status-form" action="{{ route('reports.status.update', $report->id) }}" method="POST">
                                                @method('PATCH')
                                                @csrf
                                                <select name="status_id" id="status_id-{{ $report->id }}" onchange="this.closest('form').submit()">
                                                    @foreach($statuses as $status)
                                                        @if(in_array($status->id, [1, 2, 3]))
                                                            <option value="{{ $status->id }}" @selected($report->status_id == $status->id)>
                                                                {{ $status->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </form>
                                        @else
                                            <span>
                                                {{ $report->status->name ?? '' }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $reports->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
