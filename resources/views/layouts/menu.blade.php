@if (Auth::user()->user_type == 'admin')
    <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link {{ Request::is('admin/jobs*') ? 'active' : '' }}" href="{{ route('admin.jobs.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Jobs</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('shared/internships*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('shared.internships.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Internships</span>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}"
            href="{{ route('admin.users.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Members</span>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link {{ Request::is('shared/tenders*') ? 'active' : '' }}"
            href="{{ route('shared.tenders.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Tenders</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('shared/companies*') ? 'active' : '' }}"
            href="{{ route('shared.companies.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Companies</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/filters/nationalities*') ? 'active' : '' }}"
            href="{{ route('admin.filters.nationalities.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Nationality</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/filters/proffessions*') ? 'active' : '' }}"
            href="{{ route('admin.filters.proffessions.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Profession</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/filters/experiences*') ? 'active' : '' }}"
            href="{{ route('admin.filters.experiences.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Experience</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/filters/education*') ? 'active' : '' }}"
            href="{{ route('admin.filters.education.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Education</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/filters/salaries*') ? 'active' : '' }}"
            href="{{ route('admin.filters.salaries.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Salary</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/filters/genders*') ? 'active' : '' }}"
            href="{{ route('admin.filters.genders.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Gender</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/filters/languages*') ? 'active' : '' }}"
            href="{{ route('admin.filters.languages.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Language</span>
        </a>
    </li>

@endif

@if (Auth::user()->user_type == 'candidate')
    <li class="nav-item">
        <a class="nav-link {{ Request::is('candidate/jobs*') ? 'active' : '' }}"
            href="{{ route('candidate.jobs.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>Jobs</span>
        </a>
    </li>
@endif
