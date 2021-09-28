<!-- Navigation -->
<nav class="top-menu-container">
    <div class="logo-header">
        <a href="">
            <img
                src="{{ asset('img/octo.jpg') }}"
                alt="logo effigy"
                title="logo effigy"
            />
        </a>
    </div>

    <ul>
        <li class="{{ request()->is('/') ? 'active' : '' }}">
            <a href="/">Home</a>
        </li>
        <li class="{{ request()->is('posts') ? 'active' : '' }}">
            <a href="/posts">Posts</a>
        </li>
    </ul>
</nav>