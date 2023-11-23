<x-admin-layout>
    <div class="w-full h-full flex flex-col gap-2 relative" x-data="{toggle: false}">
        <h1>
            Tenant -
            <span class="font-bold text-lg text-gray-800 capitalize">
                {{ $tenant->name }}
            </span>
        </h1>
        <div class="flex flex-col gap-2">
            <h1 class="text-lg text-gray-700 font-bold py-2">
                Personal Information

            </h1>
            <div class="grid grid-flow-row grid-cols-3 capitalize border-b-2 border-gray-200">
                <h1 class="flex items-center  py-4">
                    <span>
                        Last Name:
                        <span class="text-gray-800">
                            {{ $tenant->profile->last_name }}
                        </span>
                    </span>
                </h1>
                <h1 class="flex items-center py-4">
                    <span>
                        First Name:
                        <span class="text-gray-800">
                            {{ $tenant->profile->first_name }}
                        </span>

                    </span>
                </h1>
                <h1 class="flex items-center py-4">
                    <span>
                        Middle Name: <span class="text-gray-800">
                            {{ $tenant->profile->middle_name }}
                        </span>

                    </span>
                </h1>
                <h1 class="flex items-center py-4">
                    <span>
                        Age: <span class="text-gray-800">
                            {{ $tenant->profile->age }}
                        </span>

                    </span>
                </h1>
                <h1 class="flex items-center py-4">
                    <span>
                        Sex: <span class="text-gray-800">
                            {{ $tenant->profile->sex }}
                        </span>

                    </span>
                </h1>
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <h1 class="text-lg text-gray-700 font-bold py-2">
                Room Information

            </h1>
            <div class="grid grid-flow-row grid-cols-3 capitalize border-b-2 border-gray-200">
                <h1 class="flex items-center  py-4">
                    <span>
                        Room Number:
                        <span class="text-gray-800">
                            {{ $tenant->room->room_number }}
                        </span>
                    </span>
                </h1>
                <h1 class="flex items-center py-4">
                    <span>
                        Floor:
                        <span class="text-gray-800">
                            {{ $tenant->room->floor }}
                        </span>

                    </span>
                </h1>
                <h1 class="flex items-center py-4">
                    <span>
                        House People: <span class="text-gray-800">
                            {{ $tenant->room->household_people }}
                        </span>

                    </span>
                </h1>
                {{-- <h1 class="flex items-center py-4">
                    <span>
                        Age:  <span class="text-gray-800">
                            {{$tenant->profile->age}}
                        </span>

                    </span>
                </h1>
                <h1 class="flex items-center py-4">
                    <span>
                        Sex:  <span class="text-gray-800">
                            {{$tenant->profile->sex}}
                        </span>

                    </span>
                </h1> --}}
            </div>
        </div>


        <div class="flex flex-col gap-2 ">

            <div class="w-full flex justify-between items-center">
                <h1 class="text-lg text-gray-700 font-bold py-2">
                    Bill Information

                </h1>
                <button @click="toggle = !toggle"
                    class="btn btn-xs bg-blue-500 border-none hover:bg-blue-600 text-white">
                    <span>
                        <i class="fi fi-rr-add"></i>
                    </span>
                    <span>
                        bill
                    </span>
                </button>
            </div>

            <div class="overflow-x-auto h-full w-full">
                <table class="table table-xs">
                    <thead class="text-gray-800">
                        <tr>
                            <th></th>
                            <th>name</th>
                            <th>Amount</th>
                            <th>due date</th>
                        </tr>
                    </thead>
                    <tbody>


                        @forelse ($bills as $bill)

                            <tr>
                                <th>{{$bill->id}}</th>
                                <td>{{$bill->name}}</td>
                                <td>{{$bill->amount}}</td>
                                <td>{{$bill->due_date}}</td>

                                <td>
                                    <div class="flex items-center gap-2">
                                        <a href="{{route('admin.bill.show', ['bill' => $bill->id])}}" class="btn btn-xs btn-accent">
                                            <i class="fi fi-rr-eye"></i>
                                        </a>

                                        <button class="btn btn-xs btn-error"><i class="fi fi-rr-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="flex justify-center text-gray-800">
                                        <h1 class="text-lg">
                                            No Bill
                                        </h1>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

        <div class="w-full h-full absolute z-10" x-show="toggle" @click.outside="toggle = !toggle" x-cloak>
            <div class="h-full w-full backdrop-blur-sm bg-white/30 flex items-center justify-center">
                <form method="POST" action="{{route('admin.room.addBill', ['room' => $tenant->room->id])}}" class="w-96 h-96 rounded-lg bg-white p-4 flex flex-col shadow-lg">
                    @csrf
                    <h1 class="font-bold text-4xl w-full text-center text-gray-800">
                        Bill
                    </h1>
                    <div class="flex flex-col gap-2">
                        <label for="">Name</label>
                        <input type="text" class="input w-full bg-gray-100" name="name" placeholder="name">
                        @if($errors->has('name'))
                        <p class="text-xs text-red-500">
                            {{$errors->first('name')}}
                        </p>
                        @endif
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="">Amount</label>
                        <input type="text" class="input w-full bg-gray-100" name="amount" placeholder="Amount">
                        @if($errors->has('amount'))
                        <p class="text-xs text-red-500">
                            {{$errors->first('amount')}}
                        </p>
                        @endif
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="">Due Date</label>
                        <input type="date" class="input w-full bg-gray-100" name="due_date" placeholder="due_date">
                        @if($errors->has('due_date'))
                        <p class="text-xs text-red-500">
                            {{$errors->first('due_date')}}
                        </p>
                        @endif
                    </div>
                    <button class="btn bg-blue-500 border-none hover:bg-blue-600 duration-700 text-white">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
