<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
    <!-- Logo -->
    <div class="logo-sn ms-d-block-lg">
      <a class="pl-0 ml-0 text-center" href="index-2.html">
        <img src="{{asset('image')}}/logo.png" alt="logo">
      </a>
    </div>
    <!-- Navigation -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">

      <!-- product -->

      <!-- product end -->
      
      
      <!-- orders -->
      <li class="menu-item">
        <a href="{{route('owner_home')}}"> <span><i class="fas fa-clipboard-list fs-16"></i>Dashboard</span>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{route('show_all_code')}}"> <span><i class="fas fa-clipboard-list fs-16"></i>Code</span>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{route('show_all_subscriber')}}"> <span><i class="fas fa-clipboard-list fs-16"></i>Subscriber</span>
        </a>
      </li>
      
       <li class="menu-item">
        <a href="{{route('sms_send')}}"> <span><i class="fas fa-clipboard-list fs-16"></i>Sms Send</span>
        </a>
      </li>

     

      <li class="menu-item">
        <a href="{{route('logout')}}"> <span><i class="fas fa-clipboard-list fs-16"></i>Logout</span>
        </a>
      </li>



      <!-- orders end -->
      <!-- restaurants -->

      <!-- /Basic UI Elements -->
      <!-- Advanced UI Elements -->

      <!-- /Apps -->
    </ul>
  </aside>
