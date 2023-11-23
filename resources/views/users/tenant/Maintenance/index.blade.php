<x-tenant-layout>
    <div class="w-full h-full flex flex-col gap-2">
        <div class="flex w-full items-center justify-between">
            <h1 class="text-lg font-bold text-gray-800">
                Maintenance
            </h1>
            <a href="{{ route('tenant.maintenance.create') }}"
                class="btn btn-xs bg-blue-500 border-none hover:bg-blue-600 text-white">
                <span>
                    <i class="fi fi-rr-add"></i>
                </span>
                <span>
                    Maintenance
                </span>
            </a>
        </div>

        <div class="w-full h-96">
            <div class="overflow-x-auto h-full w-full">
                <table class="table table-xs">
                    <thead class="text-gray-800">
                        <tr>
                            <th></th>
                            <th>title</th>
                            <th>Description</th>
                            <th>time</th>
                            <th>Room Number</th>
                            {{-- <th>Status</th>
                            <th>Tenant</th>
                            <th>Household People</th> --}}
                        </tr>
                    </thead>
                    <tbody>


                        @forelse ($maintenances as $maintenance)
                            <tr>
                                <th>1</th>

                                <td>
                                    <a href="{{ $maintenance->image }}" class="venobox">
                                        <img src="{{ $maintenance->image }}" alt="" srcset=""
                                            class="h-14 w-auto object object-center">
                                    </a>

                                </td>
                                <td>{{ $maintenance->description }}</td>
                                <td>{{ $maintenance->time }}</td>
                                <td>{{ $maintenance->room->room_number }}</td>

                                <td>
                                    <div class="flex items-center">

                                        <form
                                            action="{{ route('tenant.maintenance.destroy', ['maintenance' => $maintenance->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-xs btn-error"><i class="fi fi-rr-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <div class="flex justify-center text-gray-800">
                                        <h1 class="text-lg">
                                            No Maintenance Request
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
</x-tenant-layout>
