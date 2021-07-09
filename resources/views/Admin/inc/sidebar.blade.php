<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{ asset('uploads/backend/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('uploads/backend/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li> --}}

          @auth('admin')
            <li class="nav-item">
                <a href="{{ route('admin.department.index') }}" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                    Depeartment
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.course.index') }}" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                    Course
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.session.index') }}" class="nav-link">
                <i class="nav-icon fa fa-book"></i>
                <p>
                    Session
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.semester.index') }}" class="nav-link">
                <i class="nav-icon fa fa-school"></i>
                <p>
                    Semester
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.dept-admin.index') }}" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                    Depatment Admin
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.teachers') }}" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                   Teachers
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.students') }}" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                    Students
                </p>
                </a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" class="d-inline" method="POST">
                    @csrf
                    <input type="hidden" value="admin" name="auth">
                    <button type="submit" class="btn btn-primary btn-sm btn-block">Logout</button>
                </form>
            </li>
          @endauth

          <!-- Dept admin -->
          @auth('dept_admin')
            <li class="nav-item">
                <a href="{{ route('d-admin.teacher.index') }}" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                    Teacher
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('d-admin.student.index') }}" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                    Student
                </p>
                </a>
            </li>
             <li class="nav-item">
                <form action="{{ route('logout') }}" class="d-inline" method="POST">
                    @csrf
                    <input type="hidden" value="dept_admin" name="auth">
                    <button type="submit" class="btn btn-primary btn-sm btn-block">Logout</button>
                </form>
            </li>
          @endauth

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
