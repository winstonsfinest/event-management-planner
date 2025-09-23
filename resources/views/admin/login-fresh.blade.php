<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event Management Planner - Fresh Login</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-container {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-header h2 {
            color: #333;
            margin: 0;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .btn {
            width: 100%;
            padding: 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover {
            background: #0056b3;
        }
        .error {
            color: red;
            margin-bottom: 15px;
            padding: 10px;
            background: #ffe6e6;
            border-radius: 4px;
        }
        .success {
            color: green;
            margin-bottom: 15px;
            padding: 10px;
            background: #e6ffe6;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Event Management Planner</h2>
            <p>Fresh Login - No Laravel Dependencies</p>
        </div>
        
        <div id="message"></div>
        
        <form id="freshLoginForm">
            <div class="form-group">
                <label for="email">Username:</label>
                <input type="text" name="email" id="email" placeholder="Enter username" value="calendar@thefinestgroup.co.uk" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Enter password" value="admin" required>
            </div>
            
            <button type="submit" class="btn">Sign In</button>
        </form>
        
        <script>
            console.log('Fresh login page loaded');
            
            document.getElementById('freshLoginForm').addEventListener('submit', async function(e) {
                e.preventDefault();
                console.log('Form submitted');
                
                const formData = new FormData(this);
                const data = Object.fromEntries(formData);
                
                console.log('Sending data:', data);
                console.log('Target URL: /login-raw.php');
                
                try {
                    const response = await fetch('/login-raw.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(data)
                    });
                    
                    console.log('Response status:', response.status);
                    const result = await response.json();
                    console.log('Response data:', result);
                    
                    const messageDiv = document.getElementById('message');
                    messageDiv.style.display = 'block';
                    
                    if (result.success) {
                        messageDiv.innerHTML = '<div class="success">Login successful! Redirecting...</div>';
                        setTimeout(() => {
                            window.location.href = result.redirect;
                        }, 1000);
                    } else {
                        messageDiv.innerHTML = '<div class="error">Error: ' + result.message + '</div>';
                    }
                } catch (error) {
                    console.error('Network error:', error);
                    document.getElementById('message').innerHTML = '<div class="error">Network error: ' + error.message + '</div>';
                    document.getElementById('message').style.display = 'block';
                }
            });
        </script>
    </div>
</body>
</html>
