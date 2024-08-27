<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Welcome</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
        }
        .dashboard {
            display: flex;
            flex-direction: column;
            min-height: 100%;
        }
        header {
            background-color: #4e54c8;
            color: white;
            padding: 20px;
            text-align: center;
        }
        h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
            width: 100%;
            box-sizing: border-box;
        }
        .welcome-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .welcome-card h2 {
            color: #333;
            margin-top: 0;
        }
        .welcome-card p {
            color: #666;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <header>
            <h1>Welcome to Dashboard</h1>
        </header>
        <div class="content">
            <div class="welcome-card">
                <h2>Get Started</h2>
                <p>Explore your personalized dashboard to manage tasks, view analytics, and boost your productivity.</p>
            </div>
            <!-- Thêm các phần tử dashboard khác ở đây -->
        </div>
    </div>
</body>
</html>