<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Task</title>

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
            margin-bottom: 8px;
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
            outline: none;
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #10b981;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
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
            font-size: 14px;
        }

        button {
            background: #10b981;
            color: white;
        }

        button:hover {
            background: #059669;
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

        <h1>Add New Task</h1>

        <p class="subtitle">
            Create a new task and keep track of your work.
        </p>

        <form action="/tasks" method="POST">

            @csrf

            <div class="form-group">
                <label for="task_name">Task Name</label>

                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    value="{{ old('task_name') }}"
                    placeholder="Enter task name"
                    required
                >

                @error('task_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>

                <textarea
                    id="description"
                    name="description"
                    placeholder="Describe the task..."
                >{{ old('description') }}</textarea>

                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>

                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                    value="{{ old('due_date') }}"
                >

                @error('due_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>

                <select id="status" name="status">

                    <option value="Pending"
                        {{ old('status', 'Pending') === 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Completed"
                        {{ old('status') === 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                </select>
            </div>

            <div class="buttons">

                <button type="submit">
                    Add Task
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