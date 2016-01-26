<?php 
use \Hotpms\MenuHelper;
$menu= MenuHelper::create();
?>
@section('menu')

<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        
                        
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
						@foreach($menu as $menuSection)
							<li>
                            <a href="#"><i class="fa {{$menuSection['section']->icon}} fa-fw"></i> {{$menuSection['section']->description}}<span class="fa arrow"></span></a>
                            @foreach($menuSection['items'] as $menuItem)
	                            <ul class="nav nav-second-level">
	                                <li>
	                                    @if($menuItem->route !== '')
	                                    	<a href="{{route($menuItem->route)}}">
	                                    @else
	                                    	<a href="#">
	                                    @endif
	                                    <i class="fa {{$menuItem->icon}}  fa-fw"></i>{{$menuItem->description}}</a>
	                                </li>
	                            </ul>
                            @endforeach
                            </li>
							
						@endforeach                        
							
                        </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
@endsection