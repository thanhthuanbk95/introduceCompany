<section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ url("storage/avatars/".Auth::user()->avatar) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ Auth::user()->fullname }}</p>
            @ {{ Auth::user()->name }}
        </div>
    </div>

    <ul class="sidebar-menu" id="list_pages">
        <li class="{{ Request::is('homepage')? 'active' : '' }}">
            <a href="{{ route('homepage') }}">
                <i class="fa fa-home"></i> <span>Trang chủ</span>
            </a>
        </li>
        <li class="{{ Request::is('admin/index')? 'active' : '' }}">
            <a href="{{ route('admin.index') }}">
                <i class="fa fa-bar-chart"></i> <span>Thống kê</span>
            </a>
        </li>
        @if(Auth::user()->level ==  2)

            <li class="{{ Request::is('admin/users*')? 'active' : '' }}">
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-user"></i> <span>Người dùng</span>
                </a>
            </li>

        @endif
        <li class="{{ Request::is('admin/infor')? 'active' : '' }}">
            <a href="{{ route('infor') }}">
                <i class="fa fa-newspaper-o"></i> <span>Thông tin</span>
            </a>
        </li>
        <li class="{{ Request::is('admin/introInfo')? 'active' : '' }}">
            <a href="{{ route('introInfo') }}">
                <i class="fa fa-newspaper-o"></i> <span>Giới thiệu</span>
            </a>
        </li>

        <li class="{{ Request::is('admin/parentcats*')? 'active' : '' }}">
            <a href="{{ route('parentcats.index') }}">
                <i class="fa fa-database"></i> <span>Danh mục</span>
            </a>
        </li>
        <li class="{{ Request::is('admin/categories*')? 'active' : '' }}">
            <a href="{{ route('categories.index') }}">
                <i class="fa fa-file-code-o"></i> <span>Tiểu mục</span>
            </a>
        </li>
        <li class="{{ Request::is('admin/papers*')? 'active' : '' }}">
            <a href="{{ route('papers.index') }}">
                <i class="fa fa-newspaper-o"></i> <span>Bài viết</span>
            </a>
        </li>

    </ul>
</section>