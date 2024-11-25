<!-- resources/views/components/sidebar.blade.php -->
<aside class="sidebar">
    <div class="sidebar-header">
        <h2>My App</h2>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <li>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('profile', ['username' => Auth::user()->username]) }}">Profile</a>
            </li>
            <li>
                <a href="{{ route('createPost') }}">Create Post</a>
            </li>
            <li>
                <a href="{{ route('settings') }}">Settings</a>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</aside>

<style>
    .sidebar {
        width: 250px;
        background: #fff;
        border-right: 1px solid #eaeaea;
        height: 100vh; /* Full height */
        position: fixed; /* Stay in place */
        left: 0; /* Align to the left */
        top: 0; /* Align to the top */

    }

    .sidebar-header {
        padding: 120px;

        text-align: center;
    }

    .sidebar-nav {
        margin-top: 20px;
    }

    .sidebar-nav ul {
        list-style-type: none;
        padding: 0;

    }

    .sidebar-nav li {
        padding: 15px 20px;
    }

    .sidebar-nav a {
        text-decoration: none;
        color: #333;
        display: block;
        transition: background 0.3s;
    }

    .sidebar-nav a:hover {
        background: #f0f0f0; /* Change color on hover */
    }
</style>
