<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | School Management System</title>
    <style>
        :root {
            --primary-blue: #1e3a8a;
            --accent-gold: #fbbf24;
            --bg-dark: #0f172a;
        }

        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background-color: var(--bg-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            overflow: hidden;
        }

        .splash-card {
            text-align: center;
            padding: 2rem;
            max-width: 500px;
        }

        /* The "Flash" Crest Animation */
        .crest {
            font-size: 4rem;
            margin-bottom: 20px;
            display: inline-block;
            animation: zoomIn 1.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        @keyframes zoomIn {
            0% { transform: scale(0); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        /* Typewriter Effect */
        .welcome-text {
            font-size: 1.8rem;
            font-weight: 300;
            border-right: 3px solid var(--accent-gold);
            white-space: nowrap;
            overflow: hidden;
            margin: 0 auto;
            letter-spacing: 2px;
            width: 0;
            animation: typing 2.5s steps(30, end) forwards, blink 0.8s infinite;
        }

        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes blink {
            from, to { border-color: transparent }
            50% { border-color: var(--accent-gold) }
        }

        /* Subtext fade-in */
        .sub-text {
            margin-top: 15px;
            color: #94a3b8;
            opacity: 0;
            animation: fadeIn 1s forwards 2.5s;
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }

        /* Sleek Loading Bar */
        .progress-container {
            width: 100%;
            background: rgba(255,255,255,0.05);
            height: 2px;
            margin-top: 40px;
            border-radius: 5px;
            position: relative;
        }

        .progress-bar {
            width: 0%;
            height: 100%;
            background: linear-gradient(90deg, var(--primary-blue), var(--accent-gold));
            box-shadow: 0 0 10px var(--accent-gold);
            animation: grow 5s linear forwards;
        }

        @keyframes grow {
            to { width: 100%; }
        }
    </style>
</head>
<body>

    <div class="splash-card">
        <div class="crest">🏛️</div>
        <div class="welcome-text">Welcome to EduMaster Pro</div>
        <div class="sub-text">Preparing the next generation of leaders...</div>
        
        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>
    </div>

    <?php
        // PHP logic can go here (e.g., logging the visit or checking session)
        // We use JavaScript for the actual timed redirect
    ?>

    <script>
        // Redirect after 5 seconds
        setTimeout(function() {
            window.location.href = "login.html"; 
        }, 5000);
    </script>

</body>
</html>