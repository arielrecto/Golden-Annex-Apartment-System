<x-tenant-layout>
    <div class="flex flex-col gap-2">
        <div class="flex w-full items-center justify-between">
            <h1 class="text-lg font-bold text-gray-800">
                <span>
                    <a href="{{route('tenant.maintenance.index')}}" class="btn btn-xs bg-blue-500 border-none hover:bg-blue-600 text-white">
                        <span>
                            <i class="fi fi-rr-arrow-small-left"></i>
                        </span>
                    </a>
                </span>
                Maintenance - Request
            </h1>
        </div>

        @if(Session::has('message'))
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{Session::get('message')}}</span>
          </div>
        @endif
        <form action="{{route('tenant.maintenance.store')}}" method="post" class="w-full flex flex-col h-full text-gray-800" enctype="multipart/form-data">
            <div class="flex justify-end">
                <button class="btn btn-xs bg-blue-500 border-none hover:bg-blue-600 text-white">
                    <span>
                        <i class="fi fi-rr-add"></i>
                    </span>
                    <span>
                        Create
                    </span>
                </button>
            </div>
            @csrf
            <div class="flex flex-col gap-2">
                <label for="">Description</label>
                <textarea type="text" class="textarea w-full bg-gray-100 h-32" name="description" placeholder="description">
                </textarea>
                @if($errors->has('description'))
                <p class="text-xs text-red-500">
                    {{$errors->first('description')}}
                </p>
                @endif
            </div>
            <div class="flex flex-col gap-2">
                <label for="">Date</label>
                <input type="date" class="input w-full bg-gray-100" name="time" placeholder="time & Date">
                @if($errors->has('time'))
                <p class="text-xs text-red-500">
                    {{$errors->first('time')}}
                </p>
                @endif
            </div>
            <div class="flex flex-col gap-2">
                <label for="">Image</label>
                <input type="file" name="image" class="file-input file-input-bordered file-input-info w-full bg-gray-100" />
                @if($errors->has('image'))
                <p class="text-xs text-red-500">
                    {{$errors->first('image')}}
                </p>
                @endif
            </div>




        </form>
    </div>
</x-tenant-layout>
