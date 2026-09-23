<nav>
    <a href="{{ route('subjects.index') }}"
       class="btn btn-sm {{ request()->is('subjects*') ? 'btn-light' : 'btn-outline-light' }}">
        All Subjects
    </a>
    <a href="{{ route('subjects.filter') }}"
       class="btn btn-outline-light btn-sm">
        Filter Subjects
    </a>
    <a href="{{ route('subjects.featured') }}"
       class="btn btn-outline-light btn-sm">
        Featured Subject
    </a>
</nav>