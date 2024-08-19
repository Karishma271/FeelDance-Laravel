<!-- resources/views/includes/header.blade.php -->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">FeelDance</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home.index') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('classes.index') }}">Classes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('classmember.index') }}">Class-Members</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact.index') }}">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
