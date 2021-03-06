<section>
  <aside id="leftsidebar" class="sidebar">
    <!-- user Info -->
    <div class="user-info">
      <div class="image">
        <img
          src="{{asset("storage/profile/".Auth::user()->image)}}"
          width="48"
          height="48"
          alt="{{Auth::user()->name}}"
        />
      </div>
      <div class="info-container">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{Auth::user()->name}}
        </div>
        <div class="email">
          {{Auth::user()->email}}
        </div>
        <div class="btn-group user-helper-dropdown">
          <i
            class="material-icons"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="true"
          >
            keyboard_arrow_down
          </i>
          <ul class="dropdown-menu pull-right">
            <li>
              <a
                href="{{Auth::user()->role->id == 1 ?
                            route('admin.settings.index') : route('user.settings.index')}}"
              >
                <i class="material-icons">person</i>Profile
              </a>
            </li>
            <li>
              <a
                href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
              >
                <i class="material-icons">input</i>Sign Out
              </a>
              <form
                id="logout-form"
                action="{{ route('logout') }}"
                method="POST"
                style="display: none;"
              >
                @csrf
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- #user Info -->

    <!-- Menu -->
    <div class="menu">
      <ul class="list">
        <li class="header">MAIN NAVIGATION</li>

        @if (Request::is('admin*'))
          <li class="{{Request::is('admin/dashboard') ? 'active' : ''}}">
            <a href="{{route('admin.dashboard')}}">
              <i class="material-icons">dashboard</i>
              <span>Dashboard</span>
            </a>
          </li>

          <li class="{{Request::is('admin/tag*') ? 'active' : ''}}">
            <a href="{{route('admin.tag.index')}}">
              <i class="material-icons">label</i>
              <span>Tag</span>
            </a>
          </li>

          <li class="{{Request::is('admin/category*') ? 'active' : ''}}">
            <a href="{{route('admin.category.index')}}">
              <i class="material-icons">apps</i>
              <span>Category</span>
            </a>
          </li>

          <li class="{{Request::is('admin/post*') ? 'active' : ''}}">
            <a href="{{route('admin.post.index')}}">
              <i class="material-icons">library_books</i>
              <span>Posts</span>
            </a>
          </li>

          <li class="{{Request::is('admin/tool*') ? 'active' : ''}}">
            <a href="{{route('admin.tool.index')}}">
              <i class="material-icons">library_books</i>
              <span>tools</span>
            </a>
          </li>

          <li class="{{Request::is('admin/pending/post') ? 'active' : ''}}">
            <a href="{{route('admin.post.pending')}}">
              <i class="material-icons">library_books</i>
              <span>Pending Posts</span>
            </a>
          </li>

          {{-- <li class="{{Request::is('admin/subscriber') ? 'active' : ''}}">
            <a href="{{route('admin.subscriber.index')}}">
              <i class="material-icons">subscriptions</i>
              <span>All Subscribers</span>
            </a>
          </li> --}}

          <li class="header">SYSTEM</li>

          <li class="{{Request::is('admin/settings') ? 'active' : ''}}">
            <a
              href="{{ route('admin.settings.index') }}"
            >
              <i class="material-icons">settings</i>
              <span>Settings</span>
            </a>
          </li>

          <li>
            <a
              href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            >
              <i class="material-icons">input</i>
              <span>Sign Out</span>
            </a>
            <form
              id="logout-form"
              action="{{ route('logout') }}"
              method="POST"
              style="display: none;"
            >
              @csrf
            </form>
          </li>
        @endif

        @if (Request::is('user*'))
          <li class="{{Request::is('user/dashboard') ? 'active' : ''}}">
            <a href="{{route('admin.dashboard')}}">
              <i class="material-icons">dashboard</i>
              <span>Dashboard</span>
            </a>
          </li>

          <li class="{{Request::is('user/post*') ? 'active' : ''}}">
            <a href="{{route('user.post.index')}}">
              <i class="material-icons">library_books</i>
              <span>Posts</span>
            </a>
          </li>

          <li class="header">SYSTEM</li>

          <li class="{{Request::is('user/settings') ? 'active' : ''}}">
            <a
              href="{{ route('user.settings.index') }}"
            >
              <i class="material-icons">settings</i>
              <span>Settings</span>
            </a>
          </li>

          <li>
            <a
              href="{{ route('logout') }}"
              onclick="event.preventDefault(); $('#logout-form').submit();"
            >
              <i class="material-icons">input</i>
              <span>Sign Out</span>
            </a>
            <form
              id="logout-form"
              action="{{ route('logout') }}"
              method="POST"
              style="display: none;"
            >
              @csrf
            </form>
          </li>
        @endif
      </ul>
    </div>
    <!-- #Menu -->

    <!-- Footer -->
    <div class="legal">
      <div class="copyright">
        &copy; 2019 - 2020 <a href="javascript:void(0);">SM Mehedi Hasan</a>
      </div>
    </div>
    <!-- #Footer -->
  </aside>
</section>
