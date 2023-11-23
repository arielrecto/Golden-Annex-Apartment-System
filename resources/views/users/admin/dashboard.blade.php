<x-admin-layout>
    <div class="h-full w-auto flex flex-col gap-2">
        <div class="w-full flex items-center">
            <h1 class="font-bold text-gray-800">Overview</h1>
        </div>
        <div class="grid grid-flow-col grid-cols-3 gap-2">
            <div class="h-32 w-full rounded-lg bg-accent flex flex-col gap-2">
                <span class="p-2 text-white font-lg font-bold tacking-widest">
                    Total Tenant
                </span>
                <span class="truncate text-5xl tracking-wider text-white font-bold w-5/6 p-5">
                  {{count($tenants)}}
                </span>
            </div>
            <div class="h-32 w-full rounded-lg bg-accent flex flex-col gap-2">
                <span class="p-2 text-white font-lg font-bold tacking-widest">
                    Total Rooms
                </span>
                <span class="truncate text-5xl tracking-wider text-white font-bold w-5/6 p-5">
                    {{$roomsTotal}}
                </span>
            </div>
            <div class="h-32 w-full rounded-lg bg-accent flex flex-col gap-2">
                <span class="p-2 text-white font-lg font-bold tacking-widest">
                    Mentainance
                </span>
                <span class="truncate text-5xl tracking-wider text-white font-bold w-5/6 p-5">
                   {{$maintenanceTotal}}
                </span>
            </div>
        </div>

        <div class="w-full h-full flex gap-2 items-center">
            {{-- <div class="w-1/2 flex flex-col gap-2">
                <h1 class="font-bold text-lg">Tenant</h1>
                <div id="barchart" class="w-full h-full">

                </div>
            </div> --}}
            <div class="w-full h-96 flex flex-col gap-2">
                <h1 class="font-bold text-lg capitalize">Tenant - record</h1>
                <div class="overflow-x-auto h-full w-5/6">
                    <table class="table table-xs">
                        <thead class="text-gray-800">
                            <tr>
                                <th></th>
                                <th>email</th>
                                <th>last name</th>
                                <th>first name</th>
                                <th>middle name</th>
                                <th>age</th>
                                <th>sex</th>
                                <th>room number</th>
                                <th>household people</th>
                            </tr>
                        </thead>
                        <tbody>


                            @forelse ($tenants as $tenant)
                                <tr>
                                    <th>1</th>
                                    <td>{{ $tenant->email }}</td>
                                    <td>{{ $tenant->profile->last_name }}</td>
                                    <td>{{ $tenant->profile->first_name }}</td>
                                    <td>{{ $tenant->profile->middle_name }}</td>
                                    <td>{{ $tenant->profile->age }}</td>
                                    <td>{{ $tenant->profile->sex }}</td>
                                    <td>{{ $tenant->room->room_number }}</td>
                                    <td>{{ $tenant->room->household_people }}</td>
                                    {{-- <td>
                                        <div class="flex items-center">
                                            <button class="btn btn-xs btn-error"><i class="fi fi-rr-trash"></i></button>
                                        </div>
                                    </td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="flex justify-center text-gray-800">
                                            <h1 class="text-lg">
                                                No Room
                                            </h1>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse



                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
