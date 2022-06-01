<!-- Sidebar -->
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">

			<ul>
				<li class="menu-title">
					<span>Main</span>
				</li>
				<li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
					<a href="{{route('dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
				</li>

				{{-- @can('view-category')
				<li class="{{ Request::routeIs('categories') ? 'active' : '' }}">
					<a href="{{route('categories')}}"><i class="fe fe-layout"></i> <span>Categories</span></a>
				</li>
				@endcan --}}

                @can('view-categories')
				<li class="submenu">
					<a href="#"><i class="fe fe-document"></i> <span> Departments</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						@can('view-categories')<li><a class="{{ Request::routeIs(('categories')) ? 'active' : '' }}" href="{{route('categories')}}">List Departments</a></li>@endcan
						@can('create-category')<li><a class="{{ Request::routeIs('add-category') ? 'active' : '' }}" href="{{route('add-category')}}">Add Department</a></li>@endcan
						{{-- @can('view-outstock-products')<li><a class="{{ Request::routeIs('outstock') ? 'active' : '' }}" href="{{route('outstock')}}">Out-Stock</a></li>@endcan
						@can('view-expired-products')<li><a class="{{ Request::routeIs('expired') ? 'active' : '' }}" href="{{route('expired')}}">Expired</a></li>@endcan --}}
					</ul>
				</li>
				@endcan



				@can('view-products')
				<li class="submenu">
					<a href="#"><i class="fe fe-document"></i> <span> Cubicals</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						@can('view-products')<li><a class="{{ Request::routeIs(('products')) ? 'active' : '' }}" href="{{route('products')}}">List Cubicals</a></li>@endcan
						@can('create-product')<li><a class="{{ Request::routeIs('add-product') ? 'active' : '' }}" href="{{route('add-product')}}">Add Cubicals</a></li>@endcan
						{{-- @can('view-outstock-products')<li><a class="{{ Request::routeIs('outstock') ? 'active' : '' }}" href="{{route('outstock')}}">Out-Stock</a></li>@endcan
						@can('view-expired-products')<li><a class="{{ Request::routeIs('expired') ? 'active' : '' }}" href="{{route('expired')}}">Expired</a></li>@endcan --}}
					</ul>
				</li>
				@endcan




				{{-- @can('view-reports')
				<li class="submenu">
					<a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="{{ Request::routeIs('reports') ? 'active' : '' }}" href="{{route('reports')}}">Reports</a></li>
					</ul>
				</li>
				@endcan --}}

				@can('view-access-control')
				<li class="submenu">
					<a href="#"><i class="fe fe-lock"></i> <span> Access Control</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						@can('view-permission')
						<li><a class="{{ Request::routeIs('permissions') ? 'active' : '' }}" href="{{route('permissions')}}">Permissions</a></li>
						@endcan
						@can('view-role')
						<li><a class="{{ Request::routeIs('roles') ? 'active' : '' }}" href="{{route('roles')}}">Roles</a></li>
						@endcan
					</ul>
				</li>
				@endcan

				@can('view-users')
				<li class="{{ Request::routeIs('users') ? 'active' : '' }}">
					<a href="{{route('users')}}"><i class="fe fe-users"></i> <span>Users</span></a>
				</li>
				@endcan

				<li class="{{ Request::routeIs('profile') ? 'active' : '' }}">
					<a href="{{route('profile')}}"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
				</li>
				{{-- @can('view-settings')
				<li class="{{ Request::routeIs('settings') ? 'active' : '' }}">
					<a href="{{route('settings')}}">
						<i class="fa fa-gears"></i>
						 <span> Settings</span>
					</a>
				</li>
				@endcan --}}
			</ul>
		</div>
	</div>
</div>
<!-- /Sidebar -->
