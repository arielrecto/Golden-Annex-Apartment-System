<x-admin-layout>
    <div class="w-full h-full flex flex-col gap-2">
        <div class="flex w-full items-center justify-between">
            <h1 class="text-lg font-bold text-gray-800">
                Rooms
            </h1>
            <a href="{{route('admin.room.create')}}" class="btn btn-xs bg-blue-500 border-none hover:bg-blue-600 text-white">
                <span>
                    <i class="fi fi-rr-add"></i>
                </span>
                <span>
                    Room
                </span>
            </a>
        </div>

        <div class="w-full h-96">
            <div class="overflow-x-auto h-full w-full">
                <table class="table table-xs">
                    <thead class="text-gray-800">
                        <tr>
                            <th></th>
                            <th>Room Number</th>
                            <th>Floor</th>
                            <th>Status</th>
                            <th>Tenant</th>
                            <th>Household People</th>
                        </tr>
                    </thead>
                    <tbody>


                        @forelse ($rooms as $room)
                            <tr>
                                <th>1</th>
                                <td>{{$room->room_number}}</td>
                                <td>{{$room->floor}}</td>
                                <td>{{$room->status}}</td>
                                <td>{{$room->user->name ?? 'Empty'}}</td>
                                <td>{{$room->household_people ?? 'None'}}</td>
                                <td>
                                    <div class="flex items-center">
                                        <button class="btn btn-xs btn-error"><i class="fi fi-rr-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td  colspan="7">
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
</x-admin-layout>
