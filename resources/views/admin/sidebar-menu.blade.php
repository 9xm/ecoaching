@if(auth()->user()->role == 'admin')
<ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
        <a href="{{route('admin.dashboard')}}" class="nav-link" aria-current="page">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#svg-home"></use></svg>
        Dashboard
        </a>
    </li>
   
    <li>
        <a href="{{route('admin.users.index')}}" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
        Users
        </a>
    </li>
    <li>
        <a href="{{route('admin.courses.index')}}" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
        Courses
        </a>
    </li>
    <li>
        <a href="{{route('admin.batches.index')}}" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
        Batches
        </a>
    </li>
    <li>
        <a href="{{route('admin.join.courses')}}" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
        Courses Join
        </a>
    </li>
</ul>
@endif

@if(auth()->user()->role == 'subscriber')
<ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
        <a href="{{route('admin.dashboard')}}" class="nav-link" aria-current="page">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#svg-home"></use></svg>
        Dashboard
        </a>
    </li>
    <li>
        <a href="{{route('admin.join.courses')}}" class="nav-link link-body-emphasis">
        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
        Courses Join
        </a>
    </li>
</ul>
@endif