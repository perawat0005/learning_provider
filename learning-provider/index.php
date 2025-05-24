<?php 

$data = $_GET['data'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider ID</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-xl font-bold text-blue-600">Learning Provider ID</span>
                </div>
                
                
                <div class="hidden md:ml-6 md:flex md:items-center md:space-x-4">
                    <a href="#" class="text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">หน้าแรก</a>
                    <a href="#" class="text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">ข้อมูล</a>
                    <a href="#" class="text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">เกี่ยวกับ</a>
                </div>

                
                <div class="hidden md:ml-4 md:flex-shrink-0 md:flex md:items-center">
                    <div class="relative">
                        <button id="user-menu" class="flex items-center max-w-xs text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=User+Name&background=0D8ABC&color=fff" alt="User Avatar">
                            <span class="ml-2 text-gray-700 text-sm font-medium" id="user"></span>
                            <i class="fas fa-chevron-down ml-1 text-gray-500 text-xs"></i>
                        </button>
                        
                        
                        <div id="dropdown-menu" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <div class="py-1" role="menu">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">โปรไฟล์</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">ตั้งค่า</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">ออกจากระบบ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">ข้อมูล JSON</h2>
            <div class="bg-gray-50 p-4 rounded-md">
                <pre id="json-display" class="text-sm text-gray-800 overflow-x-auto"></pre>
            </div>
        </div>
    </div>

    <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>

    <script>


        let data = <?php echo $data; ?>;
        let dataArray = []
        dataArray.push(data)

        $.each(dataArray, function(i, d1) {
            $('#user').html(d1.name_eng)
        })
        
        document.getElementById('json-display').textContent = JSON.stringify(data, null, 2);

        document.getElementById('user-menu').addEventListener('click', function() {
            document.getElementById('dropdown-menu').classList.toggle('hidden');
        });

        window.addEventListener('click', function(event) {
            if (!event.target.matches('#user-menu') && !event.target.closest('#user-menu')) {
                const dropdown = document.getElementById('dropdown-menu');
                if (!dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('hidden');
                }
            }
        });
    </script>
</body>
</html>