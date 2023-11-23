<x-admin-layout>
    <div class="flex flex-col gap-2">
        <div class="flex w-full items-center justify-between">
            <h1 class="text-lg font-bold text-gray-800">
                <span>
                    <a href="{{route('admin.room.index')}}" class="btn btn-xs bg-blue-500 border-none hover:bg-blue-600 text-white">
                        <span>
                            <i class="fi fi-rr-arrow-small-left"></i>
                        </span>
                    </a>
                </span>
                Rooms - create
            </h1>
        </div>

        @if(Session::has('message'))
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{Session::get('message')}}</span>
          </div>
        @endif
        <form action="{{route('admin.room.store')}}" method="post" class="w-full flex flex-col h-full text-gray-800">
            <div class="flex justify-end">
                <button class="btn btn-xs bg-blue-500 border-none hover:bg-blue-600 text-white">
                    <span>
                        <i class="fi fi-rr-add"></i>
                    </span>
                    <span>
                        Room
                    </span>
                </button>
            </div>
            @csrf
            <div class="flex flex-col gap-2">
                <label for="">Room Number</label>
                <input type="text" class="input w-full bg-gray-100" name="room_number" placeholder="room #">
                @if($errors->has('room_number'))
                <p class="text-xs text-red-500">
                    {{$errors->first('room_number')}}
                </p>
                @endif
            </div>
            <div class="flex flex-col gap-2">
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
            </div>
        </form>
    </div>
</x-admin-layout>
