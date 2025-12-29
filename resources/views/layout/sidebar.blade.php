<div class="sidebar">
    <aside class="menu">
        <p class="menu-label">General</p>
        <ul class="menu-list">
            @auth
                @if (auth()->user()->role === 'admin')
                    <li><a href="/admin/dashboard"><span class="icon"><i class="fas fa-chart-line"></i></i></span>
                            <span class="text">Dashboard</span></a></li>
                    <li><a href="/admin/posts"><span class="icon"><i class="fas fa-list"></i></span>
                            <span class="text">Post Queue</span></a></li>
                    <li><a href="/admin/users"><span class="icon"><i class="fas fa-users-cog"></i></span>
                            <span class="text">Users Setting</span></a></li>
                @elseif (auth()->user()->role === 'approver')
                    <li><a href="/approver/posts"><span class="icon"><i class="fas fa-list"></i></span>
                            <span class="text">Post Queue</span></a></li>
                    <li><a href="/approver/my-profile"><span class="icon"><i class="fas fa-user"></i></span>
                            <span class="text">My Profile</span></a></li>
                @elseif (auth()->user()->role === 'user')
                    <li><a href="/users/posts"><span class="icon"><i class="fas fa-list"></i></span>
                            <span class="text">Post Queue</span></a></li>
                    <li><a href="/users/my-profile"><span class="icon"><i class="fas fa-user"></i></span>
                            <span class="text">My Profile</span></a></li>
                @endif

            @endauth
            </li>
        </ul>
    </aside>
</div>

<style>
    .sidebar {
        width: 200px;
        padding: 20px;
        min-height: 100vh;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        /* transition: width 0.1s ease-in-out; */
    }

    /* Saat layar semakin sempit (contoh: lebarnya kurang dari 1080px), sembunyikan teks */
    @media (max-width: 1080px) {
        .sidebar {
            width: 60px;
            padding: 20px 10px;
        }

        .menu-list li a {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .menu-list li a .text {
            display: none;
        }

        .menu-label {
            visibility: hidden;
            height: 20px;
        }
    }
</style>
