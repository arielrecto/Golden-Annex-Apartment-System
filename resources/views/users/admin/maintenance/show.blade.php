<x-admin-layout>
    <div class="w-full h-full flex flex-col gap-2 relative" x-data="{toggle: false}">
        <h1>
            Tenant -
            <span class="font-bold text-lg text-gray-800 capitalize">
                {{ $maintenance->room->user->name }}
            </span>
        </h1>
        <div class="h-full w-full flex flex-col">
            <div class="w-full h-auto flex justify-center">
                <a href="{{$maintenance->image}}" class="venobox">
                    <img src="{{$maintenance->image}}" alt="" srcset="" class="h-96 w-auto object object-center">
                </a>

            </div>
            <div class="flex flex-col gap-2">
                <div class="text-gray-800">
                    <h1 class="font-bold">
                        Date : <span>{{$maintenance->time}}</span>
                    </h1>
                </div>
                <p class="whitespace-pre-line">
                  {{$maintenance->description}}
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>
