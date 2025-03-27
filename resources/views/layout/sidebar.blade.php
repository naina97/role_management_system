<div id="header_top" class="header_top">
    <div class="container">
        <div class="hleft">
            <a class="header-brand" href="{{route('dashboard')}}"><i class="fa fa-soccer-ball-o brand-logo"></i></a>
            <div class="dropdown">
                {{-- <a href="javascript:void(0)" class="nav-link user_btn"><img class="avatar" src="assets/images/user.png" alt="" data-toggle="tooltip" data-placement="right" title="User Menu"/></a> --}}
            <a href="javascript:void(0)" class="nav-link icon menu_toggle menu_option float-right"><i class="fa  fa-align-left"></i></a>
            </div>
        </div>
    </div>
</div>
    {{-- Secound Menu --}}
<div id="left-sidebar" class="sidebar ">
    <h5 class="brand-name">Soccer</h5>
    <nav id="left-sidebar-nav" class="sidebar-nav">
        <ul class="metismenu">
            <li class="g_heading">Project</li>
            @if(auth()->user()->hasRole('Super Admin'))
                <li class="active"><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>                        
            @endif
            @if(auth()->user()->hasRole('Company Admin'))
                <li class="active"><a href="{{route('category.index')}}"><i class="fa fa-dashboard"></i><span>Category</span></a></li>                        
            @endif
        </ul>
    </nav>        
</div>