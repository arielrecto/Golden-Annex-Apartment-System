<x-admin-layout>
    <div class="w-full h-full flex flex-col gap-2">
        <div class="flex w-full items-center justify-between">
            <h1 class="text-lg font-bold text-gray-800">
              Maintenance
            </h1>
            {{-- <a href="{{route('admin.announcement.create')}}" class="btn btn-xs bg-blue-500 border-none hover:bg-blue-600 text-white">
                <span>
                    <i class="fi fi-rr-add"></i>
                </span>
                <span>
                    Announcement
                </span>
            </a> --}}
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
                                    <a href="{{$maintenance->image}}" class="venobox">
                                        <img src="{{$maintenance->image}}" alt="" srcset="" class="object object-center h-14 w-auto">
                                    </a>

                                </td>
                                <td>{{$maintenance->description}}</td>
                                <td>{{$maintenance->time}}</td>
                                <td>{{$maintenance->room->room_number}}</td>

                                <td>
                                    <div class="flex items-center gap-2">
                                        <a href="{{route('admin.maintenance.show', ['maintenance' => $maintenance->id])}}" class="btn btn-xs btn-accent">
                                            <i class="fi fi-rr-eye"></i>
                                        </a>
                                        <button class="btn btn-xs btn-error"><i class="fi fi-rr-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td  colspan="4">
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
</x-admin-layout>
