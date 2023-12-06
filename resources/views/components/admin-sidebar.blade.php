<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Admin panel</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a
                href="{{ route("admin.announcements") }}"
                @class([
                    "nav-link text-white",
                    "bg-secondary" => $current === "announcements"
                ])
                aria-current="page"
            >
                Anunturi
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{ route("admin.activities") }}"
                @class([
                    "nav-link text-white",
                    "bg-secondary" => $current === "activities"
                ])
                aria-current="page"
            >
                Activitati
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{ route("admin.users") }}"
                @class([
                    "nav-link text-white",
                    "bg-secondary" => $current === "activities"
                ])
                aria-current="page"
            >
                Conturi
            </a>
        </li>
    </ul>
</div>
