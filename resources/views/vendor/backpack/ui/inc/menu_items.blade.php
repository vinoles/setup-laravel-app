{{-- This file is used for menu items by any Backpack v6 theme --}}
{{-- https://icons8.com/line-awesome ICONS reference --}}

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Users" icon="la la-users" :link="backpack_url('users')" />
<x-backpack::menu-item title="Clubs" icon="la la-shield" :link="backpack_url('clubs')" />
<x-backpack::menu-item title="Posts" icon="la la-newspaper-o" :link="backpack_url('posts')" />
<x-backpack::menu-item title="Translation Manager" icon="la la-stream" :link="backpack_url('translation-manager')" />

