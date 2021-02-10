<nav class="navbar navbar-expand-lg navbar-light bg-light {{ Request::routeIs('index') ? 'active' : '' }}">
    <a class="navbar-brand active" href="{{ route('index') }}">Project Manager</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item {{ Request::routeIs('employees') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('employees.index') }}">Employees</a>
          </li>
          <li class="nav-item {{ Request::routeIs('projects') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('projects.index') }}">Projects</a>
          </li>
      </ul>
    </div>
  </nav>
