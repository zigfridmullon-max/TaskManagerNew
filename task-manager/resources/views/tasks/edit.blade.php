<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Task</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        .navbar {
            background: linear-gradient(135deg, #111827, #1f2937);
            color: white;
            padding: 18px 6%;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
        }

        .brand span {
            color: #10b981;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 45px auto;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0,0,0,.06);
        }

        h1 {
            margin-top: 0;
        }

        .subtitle {
            color: #6b7280;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 9px;
            font-size: 14px;
        }

        textarea {
            min-height: 130px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        button,
        .back {
            border: none;
            padding: 12px 20px;
            border-radius: 9px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }

        button {
            background: #2563eb;
            color: white;
        }

        .back {
            background: #f3f4f6;
            color: #374151;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="brand">
        Task<span>Manager</span>
    </div>
</nav>

<div class="container">

    <div class="card">

        <h1>Edit Task</h1>

        <p class="subtitle">
            Update your task information.
        </p>

        <form action="{{ route('tasks.update', $task) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>Task Name</label>

                <input
                    type="text"
                    name="task_name"
                    value="{{ old('task_name', $task->task_name) }}"
                    required
                >

            </div>

            <div class="form-group">

                <label>Description</label>

                <textarea name="description">{{ old('description', $task->description) }}</textarea>

            </div>

            <div class="form-group">

                <label>Due Date</label>

                <input
                    type="date"
                    name="due_date"
                    value="{{ old('due_date', optional($task->due_date)->format('Y-m-d')) }}"
                >

            </div>

            <div class="form-group">

                <label>Status</label>

                <select name="status">

                    <option value="Pending"
                        {{ $task->status === 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Completed"
                        {{ $task->status === 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                </select>

            </div>

            <div class="buttons">

                <button type="submit">
                    Save Changes
                </button>

                <a href="{{ route('tasks.index') }}" class="back">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>