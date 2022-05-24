<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
    <script src="https://cdn.tailwindcss.com/?plugins=forms"></script>
</head>
<body>
<div class="p-6 bg-white border-b border-gray-200">
    <div class="flex justify-begin">
        <a href="{{ route('dashboard') }}" class="px-2 py-1 rounded-md bg-blue-500 text-sky-100 hover:bg-blue-700">Dashboard</a>
    </div>
</div>    
<div class="container">
    @yield('content')
</div>
    
</body>
</html>