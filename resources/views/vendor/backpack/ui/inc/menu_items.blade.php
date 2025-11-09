{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Translation Manager" icon="la la-stream" :link="backpack_url('translation-manager')" />

<x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('users')" />
<x-backpack::menu-item title="Clubs" icon="la la-question" :link="backpack_url('clubs')" />
<x-backpack::menu-item title="Players" icon="la la-question" :link="backpack_url('players')" />
<x-backpack::menu-item title="Posts" icon="la la-question" :link="backpack_url('posts')" />
<x-backpack::menu-item title="Teams" icon="la la-question" :link="backpack_url('teams')" />
<x-backpack::menu-item title="Leagues" icon="la la-question" :link="backpack_url('leagues')" />
<x-backpack::menu-item title="Federations" icon="la la-question" :link="backpack_url('federations')" />
