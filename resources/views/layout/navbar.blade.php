<header>
    <nav class="navbar is-fixed-top glassmorphism" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <h3 class="title is-3 ">Logo</h3>
                </a>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasic">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasic" class="navbar-menu">
                <div class="navbar-end">
                    <div class="navbar-item">
                        <a class="navbar-item" href="/">Home</a>

                        <div class="buttons">
                            @guest
                                <a class="button" href="/register"><strong>Register</strong></a>
                                <a class="button" href="/login">Log in</a>
                            @endguest

                            @auth
                                <div class="navbar-item has-dropdown is-hoverable">
                                    <a class="navbar-link">
                                        <strong>
                                            {{ auth()->user()->username }}
                                        </strong>
                                    </a>

                                    <div class="navbar-dropdown is-right">
                                        @auth
                                            @if (auth()->user()->role === 'admin')
                                                <a class="navbar-item" href="/admin/posts">Dashboard</a>
                                            @elseif (auth()->user()->role === 'approver')
                                                <a class="navbar-item" href="/approver/posts">Dashboard</a>
                                            @elseif (auth()->user()->role === 'user')
                                                <a class="navbar-item" href="/users/posts">Dashboard</a>
                                            @endif
                                        @endauth

                                        <hr class="navbar-divider">
                                        <a class="navbar-item" href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <strong>Log out</strong>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>


<style>
    .glassmorphism {
        background-color: rgba(255, 255, 255, 0.1);
        /* semi-transparent background */
        backdrop-filter: blur(10px);
        /* blur effect */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* subtle shadow */
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        /* border to enhance effect */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Add a click event on each of them
        $navbarBurgers.forEach(el => {
            el.addEventListener('click', () => {

                // Get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

            });
        });

    });
</script>
