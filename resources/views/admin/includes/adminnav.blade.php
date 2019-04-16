<!--This is for when the menu collapse it will show the hamburger icon-->
<div class="title-bar" data-responsive-toggle="main-nav" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle="main-nav"></button>
  <div class="title-bar-title">Menu</div>
</div>

<div class="top-bar" id="main-nav">
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <li class="menu-text">Quick Question</li>
      <!--Take the admin to page that displays all the users-->
      <li><a href="admin/users">Users</a></li>
    </ul>
  </div>
  <div class="top-bar-right">
    <ul class="dropdown menu" data-dropdown-menu>
       <li>
         <!--Show that the user is an admin by displaying this in the top right-->
        <a href="#">Admin</a>
        <ul class="menu vertical">
          <li><a href="#">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
