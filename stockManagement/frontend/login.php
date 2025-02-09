<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh; 
            display: flex;
            justify-content: center; 
            align-items: center; 
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .login-container {
            width: 100%;
            max-width: 400px; 
            background: rgba(255, 255, 255, 0.2); 
            padding: 30px;
            border-radius: 10px; 
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
            backdrop-filter: blur(10px);
            text-align: center;
        }

      
        .login-container h2 {
            color: white;
            font-size: 24px;
            margin-bottom: 20px; 
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block; 
            font-size: 14px;
            color: white;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 5px; 
            background: rgba(255, 255, 255, 0.2); 
            color: white;
            outline: none;
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.7);
            
        }
        p {
            margin-top: 12px;
            color: black;
        }

       
        input:focus {
            background: rgba(255, 255, 255, 0.3);
            border: 1px solid white;
        }

        
        .login-btn {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            background: white;
            color: #764ba2;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        a:hover {
            background-color: black;
            color:white;
        }

     
        .login-btn:hover {
            background: #f0f0f0; 
        }

        @media (max-width: 500px) {
            .login-container {
                width: 90%; 
            }
        }
    </style>

</head>
<body>

    <div class="login-container">
        <h2>Login</h2>
        <form>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>

            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
        <p>Hi</p>
           
            <button type="submit" class="login-btn">Login</button>
            <p>Already a member?  <a href="signin.php">Click Here </a>To Create Account</a></p>
        </form>
    </div>

</body>
</html>
