<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">FeelDance Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.members.index') }}">Members</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.classes.index') }}">Classes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>