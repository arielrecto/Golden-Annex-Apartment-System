@php

    $urls = [
        [
            'route' => 'tenant.dashboard',
            'name' => 'Dashboard',
            'icon' => 'fi fi-rr-dashboard',
        ],
        // [
        //     'route' => 'admin.tenant.index',
        //     'name' => 'Tenant',
        //     'icon' => 'fi fi-rr-house-chimney-user',
        // ],
        // [
        //     'route' => 'admin.room.index',
        //     'name' => 'Rooms',
        //     'icon' => 'fi fi-rr-bed-alt',
        // ],
        [
            'route' => 'tenant.announcement.index',
            'name' => 'Announcement',
            'icon' => 'fi fi-rr-ad',
        ],
        [
            'route' => 'tenant.maintenance.index',
            'name' => 'Maintenance',
            'icon' => 'fi fi-rr-tools',
        ],
    ];

@endphp


<div class="w-auto min-h-screen relative" x-data="{ toggle: true }">

    <div class="w-72 h-screen flex flex-col gap-2 p-4" x-show="toggle" x-transition.duration.500ms>
        <div class="w-full h-16">
            <h1 class="text-xl">
                <span class="text-blue-500 font-bold">Golden Annex</span>
                <span>Apartment</span>
            </h1>
        </div>
        <ul>
            @foreach ($urls as $url)
                <li class="py-2">
                    <a href="{{route($url['route'])}}" class="capitalize gap-2 flex items-center w-full h-full">
                        <span>
                            <i class=" {{ $url['icon'] }} pt-2"></i>
                        </span>
                        <span>
                            {{ $url['name'] }}
                        </span>
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
    <button class="btn btn-xs bg-blue-500 hover:bg-blue-600 text-white border-none absolute -right-5 top-5"
        @click="toggle = !toggle"><i
            :class="`fi ${toggle ? 'fi-rr-angle-small-left' : 'fi-rr-angle-small-right'}`"></i></button>
</div>
