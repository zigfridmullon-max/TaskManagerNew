<!DOCTYPE html>
<html lang="en">
<head><
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Tasks</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Inter, Arial, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        .navbar {
            background: linear-gradient(135deg, #111827, #1f2937);
            color: white;
            padding: 18px 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .brand {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .brand span {
            color: #10b981;
        }

        .nav-right {
            font-size: 14px;
            color: #d1d5db;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 45px auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title h1 {
            font-size: 34px;
            color: #111827;
            margin-bottom: 7px;
        }

        .page-title p {
            color: #6b7280;
            font-size: 15px;
        }

        .add-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #10b981;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            transition: 0.2s ease;
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.25);
        }

        .add-btn:hover {
            background: #059669;
            transform: translateY(-1px);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 22px;
            border-radius: 15px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.04);
        }

        .stat-label {
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: #111827;
        }

        .tasks-card {
            background: white;
            border-radius: 16px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .tasks-header {
            padding: 20px 24px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .tasks-header h2 {
            font-size: 18px;
            color: #111827;
        }

        .task-count {
            font-size: 13px;
            color: #6b7280;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f9fafb;
            color: #6b7280;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-align: left;
            padding: 14px 20px;
            font-weight: 600;
        }

        td {
            padding: 18px 20px;
            border-top: 1px solid #f0f2f5;
            font-size: 14px;
        }

        tr {
            transition: 0.2s ease;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        .task-name {
            font-weight: 600;
            color: #111827;
        }

        .description {
            color: #6b7280;
        }

        .date {
            color: #4b5563;
        }

        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
        }

        .status.completed {
            background: #dcfce7;
            color: #15803d;
        }

        .status.pending {
            background: #fef3c7;
            color: #b45309;
        }

        .status.in-progress {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            border: none;
            padding: 7px 11px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }

        .edit {
            background: #eff6ff;
            color: #2563eb;
        }

        .delete {
            background: #fef2f2;
            color: #dc2626;
        }

        .complete {
    background: #dcfce7;
    color: #15803d;
}

.pending-btn {
    background: #fef3c7;
    color: #b45309;
}

        .empty-state {
            text-align: center;
            padding: 70px 20px;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        .empty-state h3 {
            font-size: 18px;
            margin-bottom: 8px;
            color: #111827;
        }

        .empty-state p {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .container {
                width: 94%;
                margin: 30px auto;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 18px;
            }

            .page-title h1 {
                font-size: 28px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 16px 4%;
            }

            .nav-right {
                display: none;
            }

            .tasks-header {
                padding: 18px;
            }

            th,
            td {
                padding: 14px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">
            Task<span>Manager</span>
        </div>

        <div class="nav-right">
            Stay organized. Get things done.
        </div>
    </nav>

    <main class="container">

        <div class="page-header">

            <div class="page-title">
                <h1>My Tasks</h1>
                <p>Manage your work and stay on top of your deadlines.</p>
            </div>

           <a href="/tasks/create" class="add-btn">
    + Add Task
</a>
        </div>

        <div class="stats">

            <div class="stat-card">
                <div class="stat-label">Total Tasks</div>
                <div class="stat-number">
                    {{ $tasks->count() }}
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Completed</div>
                <div class="stat-number">
                    {{ $tasks->where('status', 'Completed')->count() }}
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Pending</div>
                <div class="stat-number">
                    {{ $tasks->where('status', 'Pending')->count() }}
                </div>
            </div>

        </div>

        <section class="tasks-card">

            <div class="tasks-header">
                <h2>Task List</h2>

                <span class="task-count">
                    {{ $tasks->count() }} task(s)
                </span>
            </div>

            @if($tasks->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Description</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($tasks as $task)

                                <tr>

                                    <td>
                                        <div class="task-name">
                                            {{ $task->task_name }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="description">
                                            {{ $task->description ?? 'No description' }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="date">
                                            {{ $task->due_date ?? 'No date' }}
                                        </div>
                                    </td>

                                    <td>

                                        @php
                                            $status = strtolower($task->status ?? 'pending');
                                        @endphp

                                        <span class="status {{ str_replace(' ', '-', $status) }}">
                                            {{ ucfirst($status) }}
                                        </span>

                                    </td>

                                    <td>

                                        <div class="actions">

    {{-- Edit --}}
    <a
        href="/tasks/{{ $task->id }}/edit"
        class="action-btn edit"
    >
        Edit
    </a>

    {{-- Update Status --}}
    <form
        action="/tasks/{{ $task->id }}/status"
        method="POST"
    >
        @csrf
        @method('PATCH')

        @if($task->status === 'Pending')
            <input type="hidden" name="status" value="Completed">

            <button
                type="submit"
                class="action-btn complete"
            >
                Complete
            </button>
        @else
            <input type="hidden" name="status" value="Pending">

            <button
                type="submit"
                class="action-btn pending-btn"
            >
                Mark Pending
            </button>
        @endif
    </form>

    {{-- Delete --}}
    <form
        action="/tasks/{{ $task->id }}"
        method="POST"
        onsubmit="return confirm('Are you sure you want to delete this task?');"
    >
        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="action-btn delete"
        >
            Delete
        </button>
    </form>

</div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty-state">

                    <div class="empty-icon">📝</div>

                    <h3>No tasks yet</h3>

                    <p>
                        You don't have any tasks. Create your first task to get started.
                    </p>

                  

                </div>

            @endif

        </section>

    </main>

</body>
</html>