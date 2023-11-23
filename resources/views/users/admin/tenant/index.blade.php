<x-admin-layout>
    <div class="w-full h-full flex flex-col gap-2">
        <div class="flex w-full items-center justify-between">
            <h1 class="text-lg font-bold text-gray-800">
                Tenants
            </h1>
            <a href="{{route('admin.tenant.create')}}" class="btn btn-xs bg-blue-500 border-none hover:bg-blue-600 text-white">
                <span>
                    <i class="fi fi-rr-add"></i>
                </span>
                <span>
                    Tenant
                </span>
            </a>
        </div>

        <div class="w-full h-96">
            <div class="overflow-x-auto h-full w-full">
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
                                <td>{{$tenant->email}}</td>
                                <td>{{$tenant->profile->last_name}}</td>
                                <td>{{$tenant->profile->first_name}}</td>
                                <td>{{$tenant->profile->middle_name}}</td>
                                <td>{{$tenant->profile->age}}</td>
                                <td>{{$tenant->profile->sex}}</td>
                                <td>{{$tenant->room->room_number}}</td>
                                <td>{{$tenant->room->household_people}}</td>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <a href="{{route('admin.tenant.show', ['tenant' => $tenant->id])}}" class="btn btn-xs btn-accent">
                                            <i class="fi fi-rr-eye"></i>
                                        </a>

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
