<x-admin-layout>

    <div class="flex flex-col gap-2">
        <h1 class="font-bold text-3xl">
            Inbox
        </h1>
        <div class="h-full w-full flex gap-2 p-4 flex-col">
            @forelse ($inboxes as $inbox)

            <div class="grid grind-flow-row grid-cols-4 w-full bg-gray-100 hover:bg-gray-200 duration-700 rounded-lg p-4">
                <h1 class="text-center w-full">{{$inbox->email}}</h1>
                <h1 class="text-center w-full">{{$inbox->description}}</h1>
                <h1 class="text-center w-full">{{$inbox->created_at}}</h1>
                <div class="text-center w-full flex gap-2">
                    <h1 class="flex gap-2">
                        <a href="{{route('inbox.show', ['index' => $inbox->id])}}" class="btn btn-xs bg-blue-500 border-none hover:bg-blue-700 duration-700 text-white"><i class="fi fi-rr-eye"></i></a>
                    </h1>
                    <form action="{{route('inbox.destroy', ['inbox' => $inbox->id])}}" method="post">
                        @csrf
                        <button class="btn btn-xs btn-error e"><i class="fi fi-rr-trash"></i></button>
                    </form>
                </div>

            </div>

            @empty
                <div class="flex justify-center">
                    <h1 class="font-bold text-3xl">No Inbox</h1>
                </div>
            @endforelse
        </div>

    </div>


</x-admin-layout>
