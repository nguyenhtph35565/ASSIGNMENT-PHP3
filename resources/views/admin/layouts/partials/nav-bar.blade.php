<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="/admin"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i></i>News</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i></i><a href="{{ route('admin.create') }}">Create</a></li>
                        <li><i></i><a href="{{ route('admin.table') }}">Table</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i></i>Categories</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i></i><a href="{{ route('admin.createCate') }}">Create</a></li>
                        <li><i></i><a href="{{ route('admin.categories.table') }}">Table</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</aside>
