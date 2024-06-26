<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pencatatan Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            display: flex;
            height: 100vh;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 280px;
            transition: margin-left 0.3s ease;
        }

        .sidebar {
            width: 280px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            background-color: #6c757d;
            color: white;
            padding: 20px;
            transition: width 0.3s ease;
        }

        .sidebar .nav-link span {
            display: inline;
        }

        .sidebar .brand-text {
            display: inline;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
            }

            .sidebar .nav-link span {
                display: none;
            }

            .sidebar .brand-text {
                display: none;
            }

            .content {
                margin-left: 80px;
            }

            .menu-toggle {
                display: block;
            }
        }

        .menu-toggle {
            display: none;
            cursor: pointer;
            padding: 10px;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }
    </style>
</head>

<body>
    <div class="menu-toggle">
        <span data-feather="menu" onclick="toggleSidebar()"></span>
    </div>
    @include('components.sidebar')
    <div class="content">
        <main>
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        feather.replace()

        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            if (sidebar.style.width === '280px') {
                sidebar.style.width = '80px';
                document.querySelector('.content').style.marginLeft = '80px';
            } else {
                sidebar.style.width = '280px';
                document.querySelector('.content').style.marginLeft = '280px';
            }
        }
    </script>
</body>

</html>
