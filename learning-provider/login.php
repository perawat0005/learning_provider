<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider ID</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .login-bg {
            background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .login-card {
            backdrop-filter: blur(7px);
        }
    </style>
</head>
<body class="login-bg min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white bg-opacity-10 rounded-xl shadow-lg overflow-hidden login-card">
        <div class="p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome Back</h1>
                <p class="text-gray-800">Sign in to your account</p>
            </div>
            
            
            <div class="mt-6">
                
                <div class="mt-6">
                    <div>
                        <a href="
                        https://moph.id.th/oauth/redirect?client_id=XXX&redirect_uri=XXX&response_type=code&state=XXX"  
                        class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 border-opacity-20 rounded-md shadow-sm text-sm font-medium text-gray-600 bg-white bg-opacity-10 hover:bg-opacity-20">
                            <img src="provider.png" class="h-20 w-auto object-contain">
                        </a>

                        <!-- 
                        ที่ต้องใส่ ตรง XXX 
                        1.Client ID ของ Health ID
                        2.redirect_uri ที่ลงทะเบียนขอใช้
                        3.state ให้ใส่ Path mี่เราต้องการจะให้ระบบ redirect กลับมา เช่น https://erp.moph.go.th/
                         -->
                        
                    </div>
                    
                
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>