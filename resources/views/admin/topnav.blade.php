<div class="nav_menu">
    <nav class="nav navbar-nav">
      <div class="navbar-left"><img src="/img/ccmc-logo.png" alt="" ></div>
      
    <ul class=" navbar-right">
      <li class="nav-item dropdown open" style="padding-left: 15px;">
        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
          <img src="https://khoinguonsangtao.vn/wp-content/uploads/2022/02/anh-dai-dien-fb-dep.jpg" alt=""><?=$user->name?>
        </a>
        <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item"  href="javascript:;">
              <span>Settings</span>
            </a>
          <a class="dropdown-item"  href="{{ route('admin.logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
        </div>
      </li>
    </ul>
  </nav>
</div>