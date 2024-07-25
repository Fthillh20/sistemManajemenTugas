<x-table.table-panel tableName="Tasks" :paginatorAttr="$tasks">
    <div class="container flex items-center">
        <form method="GET" action="/task">
            <x-form.input inputName="search" type="date" value="{{ request('search') }}"/>
            <x-form.button  buttonName="search" class=""/>
        </form>

        <form method="GET" action="/task" class="mr-5">
            <x-form.input inputName="searchbody" value="{{ request('search') }}"/>
            <x-form.button  buttonName="search"/>
        </form>
    </div>
    <thead>
        <tr>
            <x-table.table-head thName="Tanggal di buat" />
            <x-table.table-head thName="Nama tugas" />
            <x-table.table-head thName="Di buat oleh" />
            <x-table.table-head thName="Penerima Tugas" />
            <x-table.table-head thName="Deadline" />
            <x-table.table-head thName="Status" />
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
            <tr class="hover:bg-grey-lighter">
                <x-table.table-data tdName="{{ date_format($task->created_at, 'd/m/Y') }}" />
                <td class="py-4 px-6 border-b border-grey-light">
                    <a href="/task/{{$task->id}}" class="underline"> {{ ucwords($task->title) }}</a>
                </td>
                <x-table.table-data tdName="{{ $task->getTaskCreatorUser()}}" />
                <x-table.table-data tdName="{{ $task->getAssignedUser() }}" />
                <x-table.table-data tdName="{{date('d/m/Y', strtotime($task->due))}}" />
                @if($task->completed)
                 <x-table.table-data tdName="Yes" />
                @else
                <x-table.table-data tdName="No" />
                @endif
            </tr>
        @endforeach
    </tbody>
</x-table.table-panel>
