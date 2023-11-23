<x-admin-layout>
    <div class="flex flex-col gap-2">
        <div class="flex w-full items-center justify-between">
            <h1 class="text-lg font-bold text-gray-800">
                <span>
                    <a href="{{route('admin.tenant.index')}}" class="btn btn-xs bg-blue-500 border-none hover:bg-blue-600 text-white">
                        <span>
                            <i class="fi fi-rr-arrow-small-left"></i>
                        </span>
                    </a>
                </span>
                Tenant - create
            </h1>
        </div>

        @if(Session::has('message'))
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{Session::get('message')}}</span>
          </div>
        @endif
        <form action="{{route('admin.tenant.store')}}" method="post" class="w-full flex flex-col h-full text-gray-800">
            <div class="flex justify-end">
                <button class="btn btn-xs bg-blue-500 border-none hover:bg-blue-600 text-white">
                    <span>
                        <i class="fi fi-rr-add"></i>
                    </span>
                    <span>
                       Tenant
                    </span>
                </button>
            </div>
            @csrf


            <div class="grid grid-flow-row grid-cols-2 gap-2">
                <div class="flex flex-col gap-2">
                    <label for="">Email</label>
                    <input type="email" class="input w-full bg-gray-100" name="email" placeholder="Email">
                    @if($errors->has('email'))
                    <p class="text-xs text-red-500">
                        {{$errors->first('email')}}
                    </p>
                    @endif
                </div>
                <div class="flex flex-col gap-2">
                    <label for="">Password</label>
                    <input type="password" class="input w-full bg-gray-100" name="password" placeholder="password">
                    @if($errors->has('password'))
                    <p class="text-xs text-red-500">
                        {{$errors->first('password')}}
                    </p>
                    @endif
                </div>
            </div>


            <div class="grid grid-flow-row grid-cols-3 gap-4">
                <div class="flex flex-col gap-2">
                    <label for="">Last Name</label>
                    <input type="text" class="input w-full bg-gray-100" name="last_name" placeholder="Last Name">
                    @if($errors->has('last_name'))
                    <p class="text-xs text-red-500">
                        {{$errors->first('last_name')}}
                    </p>
                    @endif
                </div>
                <div class="flex flex-col gap-2">
                    <label for="">Last first</label>
                    <input type="text" class="input  w-full bg-gray-100" name="first_name" placeholder="First Name">
                    @if($errors->has('first_name'))
                    <p class="text-xs text-red-500">
                        {{$errors->first('first_name')}}
                    </p>
                    @endif
                </div>
                <div class="flex flex-col gap-2">
                    <label for="">Middle Name</label>
                    <input type="text" class="input w-full bg-gray-100" name="middle_name" placeholder="Middle Name">
                </div>

            </div>

            <div class="grid grid-flow-row grid-cols-2 gap-2">
                <div class="flex flex-col gap-2">
                    <label for="">Age</label>
                    <input type="text" class="input w-full bg-gray-100" name="age" placeholder="Age">
                    @if($errors->has('age'))
                    <p class="text-xs text-red-500">
                        {{$errors->first('age')}}
                    </p>
                    @endif
                </div>
                <div class="flex flex-col gap-2">
                    <label for="">Sex</label>
                    <select class="select select-bordered w-full bg-gray-100 " name="sex">
                        <option disabled selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>

                      </select>
                      @if($errors->has('sex'))
                    <p class="text-xs text-red-500">
                        {{$errors->first('sex')}}
                    </p>
                    @endif
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <label for="">Rooms</label>
                <select class="select select-bordered w-full bg-gray-100 " name="room">
                    <option disabled selected>Select Room</option>

                    @forelse ($rooms as $room)
                    <option value="{{$room->id}}">{{$room->room_number}}</option>
                    @empty
                    <option disabled>No Room Available</option>
                    @endforelse
                  </select>
                  @if($errors->has('sex'))
                <p class="text-xs text-red-500">
                    {{$errors->first('sex')}}
                </p>
                @endif
            </div>
            <div class="flex flex-col gap-2">
                <label for="">Household People</label>
                <input type="text" class="input w-full bg-gray-100" name="household_people" placeholder="Household People">
                @if($errors->has('household_people'))
                <p class="text-xs text-red-500">
                    {{$errors->first('household_people')}}
                </p>
                @endif
            </div>

            {{-- <div class="flex flex-col gap-2">
                <label for="">Floor</label>
                <select class="select select-bordered w-full bg-gray-100" name="floor">
                    <option disabled selected>Select Floor</option>
                    <option value="floor 1">Floor 1</option>
                    <option value="floor 2">Floor 2</option>
                    <option value="floor 3">Floor 3</option>
                    <option value="floor 4">Floor 4</option>
                  </select>
                  @if($errors->has('floor'))
                <p class="text-xs text-red-500">
                    {{$errors->first('floor')}}
                </p>
                @endif
            </div> --}}
        </form>
    </div>
</x-admin-layout>
