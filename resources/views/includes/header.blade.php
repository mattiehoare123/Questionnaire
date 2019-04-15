<!--This is for when the menu collapse it will show the hamburger icon on the left side-->
<div class="title-bar" data-responsive-toggle="main-nav" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle="main-nav"></button>
  <div class="title-bar-title">Menu</div><!--This will display when the menu has collapsed-->
</div>
<!--Left side of the menu-->
<div class="top-bar" id="main-nav">
  <div class="top-bar-left">
    <!--When collapsed these two sections will become a dropdown menu-->
    <ul class="dropdown menu" data-dropdown-menu>
      <li class="menu-text">Quick Question</li><!--Name of the application-->
      <li><a href="{{ url('dashboard')}}">My Questionnaires</a></li><!--Go back to dashboard view-->
    </ul>
  </div>
  <!--Right side of the menu-->
  <div class="top-bar-right">
    <ul class="dropdown menu" data-dropdown-menu>
       <li>
         <!--Display the users name-->
        <a href="#">Matthew Hoare</a>
        <ul class="menu vertical">
          <!--A dropdown menu which allow the user to logout-->
          <li><a href="#">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
