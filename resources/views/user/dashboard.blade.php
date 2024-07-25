<x-table.table-panel tableName="{{ ucwords($user->name) }} Tasks" :paginatorAttr="$tasks">
    {{-- summary panel --}}
    <div class="container">
        <x-content-layout contentName="Completed" contents="{{ $user->noOfTaskCompleted() }}" />
        <x-content-layout contentName="Due" contents="{{ $user->noOfTaskDue() }}" />
        <x-content-layout contentName="Task Created" contents="{{ $user->noOfTaskCreated() }}" />
        <x-content-layout contentName="Task Assigned" contents="{{ $user->noOfTaskAssigned() }}" />
    </div>

    {{-- User's task table --}}

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
                    <a href="/task/{{ $task->id }}" class="underline">{{ $task->title }}</a>
                </td>
                <x-table.table-data tdName="{{ $task->getTaskCreatorUser() }}" />
                <x-table.table-data tdName="{{ $task->getAssignedUser() }}" />
                <x-table.table-data tdName="{{ $task->due }}" />
                @if ($task->completed)
                    <x-table.table-data tdName="Yes" />
                @else
                    <x-table.table-data tdName="No" />
                @endif
            </tr>
        @endforeach
    </tbody>
</x-table.table-panel>
