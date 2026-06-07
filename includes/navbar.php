<!-- Navigation Bar -->
<nav class="navbar navbar-expand-md navbar-light sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="../"><img src="../media/Logo-Horizontal.png" alt="Gro Artistry Logo" width="280"/></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <!-- Menu -->
            <i class="fa-solid fa-bars-staggered menu-open"></i>
            <!--  Close Menu  -->
            <i class="fa-solid fa-xmark menu-close"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#appointment">Appointments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#reviews">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggler = document.querySelector('.navbar-toggler');
    const menu = document.getElementById('navbarNav');

    menu.addEventListener('show.bs.collapse', function () {
        toggler.classList.add('active');
    });

    menu.addEventListener('hide.bs.collapse', function () {
        toggler.classList.remove('active');
    });
});
</script>