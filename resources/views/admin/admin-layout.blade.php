<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
            --accent-color: #3498db;
            --light-bg: #f8f9fa;
            --dark-text: #2c3e50;
            --sidebar-width: 250px;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7f9;
            overflow-x: hidden;
        }
        
        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary-color), #1a2530);
            color: white;
            z-index: 1000;
            transition: all 0.3s;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .sidebar-brand {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }
        
        .sidebar-brand h4 {
            margin: 0;
            font-weight: 700;
        }
        
        .sidebar-nav {
            padding: 15px 0;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            margin: 2px 10px;
            border-radius: 6px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .nav-link:hover, .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        .submenu {
            padding-left: 30px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        
        .submenu.show {
            max-height: 500px;
        }
        
        .submenu-link {
            padding: 10px 15px;
            color: rgba(255, 255, 255, 0.7);
            display: block;
            border-radius: 4px;
            transition: all 0.2s;
            font-size: 14px;
        }
        
        .submenu-link:hover, .submenu-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.08);
        }
        
        .submenu-link i {
            font-size: 12px;
            margin-right: 8px;
        }
        
        .menu-arrow {
            transition: transform 0.3s;
        }
        
        .menu-arrow.rotated {
            transform: rotate(90deg);
        }
        
        /* Main Content Styles */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: all 0.3s;
        }
        
        .header {
            background: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .welcome-text h2 {
            margin: 0;
            font-size: 24px;
            color: var(--dark-text);
        }
        
        .welcome-text p {
            margin: 5px 0 0;
            color: #6c757d;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
        }
        
        .user-info {
            margin-right: 15px;
            text-align: right;
        }
        
        .user-name {
            font-weight: 600;
            color: var(--dark-text);
        }
        
        .user-role {
            font-size: 13px;
            color: #6c757d;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                text-align: center;
            }
            
            .sidebar-brand h4, .nav-link span, .submenu {
                display: none;
            }
            
            .nav-link i {
                margin-right: 0;
                font-size: 20px;
            }
            
            .main-content {
                margin-left: 70px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <h4><i class="fas fa-home"></i> <span>Admin Panel</span></h4>
        </div>
        <ul class="sidebar-nav">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <div>
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.general') }}" class="nav-link {{ request()->routeIs('admin.general') ? 'active' : '' }}">
                    <div>
                        <i class="fas fa-cog"></i>
                        <span>General</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.posts.index') }}"  class="nav-link" id="posts-menu">
                    <div>
                        <i class="fas fa-newspaper"></i>
                        <span>Posts</span>
                    </div>
                    <i class="fas fa-chevron-right menu-arrow"></i>
                </a>
                <div class="submenu" id="posts-submenu">
                    <a href="{{ route('admin.posts.index') }}" class="submenu-link">
                        <i class="fas fa-bars"></i>
                        All Posts
                    </a>
                    <a href="{{ route('admin.posts.create') }}"  class="submenu-link">
                        <i class="fas fa-plus"></i>
                        Add New
                    </a>
                    <a href="{{ route('admin.posts.categories') }}"  class="submenu-link">
                        <i class="fas fa-tags"></i>
                        Categories
                    </a>
                </div>
            </li>
            <li>
                <a href="{{ route('admin.form-submissions') }}" class="nav-link">
                    <div>
                        <i class="fas fa-file-alt"></i>
                        <span>Form Submissions</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.projects.index') }}" class="nav-link" id="projects-menu">
                    <div>
                        <i class="fas fa-building"></i>
                        <span>Projects</span>
                    </div>
                    <i class="fas fa-chevron-right menu-arrow"></i>
                </a>
                <div class="submenu" id="projects-submenu">
                    <a href="{{ route('admin.projects.residential') }}" class="submenu-link">
                        <i class="fas fa-home"></i>
                        Residential Projects
                    </a>
                    <a href="{{ route('admin.projects.commercial') }}" class="submenu-link">
                        <i class="fas fa-city"></i>
                        Commercial Projects
                    </a>
                </div>
            </li>
            <li>
                <a href="{{ route('admin.features') }}" class="nav-link">
                    <div>
                        <i class="fas fa-star"></i>
                        <span>Features</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.partners') }}" class="nav-link">
                    <div>
                        <i class="fas fa-handshake"></i>
                        <span>Partners</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.site-settings') }}" class="nav-link">
                    <div>
                        <i class="fas fa-sliders-h"></i>
                        <span>Site Settings</span>
                    </div>
                </a>
            </li>
            <li>
                <form action="{{ route('admin.logout') }}" method="POST" id="logout-form">
                    @csrf
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div>
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Log Out</span>
                        </div>
                    </a>
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle submenus
        document.getElementById('posts-menu').addEventListener('click', function(e) {
            e.preventDefault();
            this.querySelector('.menu-arrow').classList.toggle('rotated');
            document.getElementById('posts-submenu').classList.toggle('show');
        });
        
        document.getElementById('projects-menu').addEventListener('click', function(e) {
            e.preventDefault();
            this.querySelector('.menu-arrow').classList.toggle('rotated');
            document.getElementById('projects-submenu').classList.toggle('show');
        });
        
        // Active menu item handling
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                if (!this.querySelector('.menu-arrow')) {
                    // Remove active class from all nav links
                    document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                    // Add active class to clicked link
                    this.classList.add('active');
                }
            });
        });
        
        document.querySelectorAll('.submenu-link').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelectorAll('.submenu-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>