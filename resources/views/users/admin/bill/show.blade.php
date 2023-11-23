<x-admin-layout>
    <div class="w-full h-full flex flex-col gap-2 relative" x-data="printPDF">
        <h1>
            Bill -
            <span class="font-bold text-lg text-gray-800 capitalize">
                {{ $bill->name }}
            </span>
        </h1>
        <div class="flex flex-col gap-2" >
            <div class="flex justify-between items-center">
                <h1 class="text-lg text-gray-700 font-bold py-2">
                    <span>
                        <a href="{{route('admin.tenant.index')}}" class="btn btn-xs bg-blue-500 hover:bg-blue-600 text-white duration-700 border-none"
                    >
                    <i class="fi fi-rr-arrow-small-left"></i>
                </a>
                    </span>
                    Bill Information

                </h1>
                <a href="{{route('pdf.bill', ['bill' => $bill->id])}}" class="btn btn-xs bg-blue-500 hover:bg-blue-600 text-white duration-700 border-none"
                    >
                    <i class="fi fi-rr-print"></i>
                </a>
            </div>

            <div id="element-to-print">

                <div class="grid grid-flow-row grid-cols-3">
                    <h1>
                        <span>
                            Name :
                            <span >
                                {{ $bill->name }}
                            </span>
                        </span>
                    </h1>
                    <h1>
                        <span>
                            Amount:
                            <span>
                                {{ $bill->amount }}
                            </span>

                        </span>
                    </h1>
                    <h1>
                        <span>
                            Due Date: <span >
                                {{ $bill->due_date }}
                            </span>

                        </span>
                    </h1>
                    <h1>
                        <span>
                            Tenant Name: <span>
                                {{ $bill->room->user->name }}
                            </span>

                        </span>
                    </h1>
                    <h1>
                        <span>
                            Room Number: <span >
                                {{ $bill->room->room_number }}
                            </span>

                        </span>
                    </h1>
                </div>
            </div>


            @if($bill->payment !== null)
            <div class="flex flex-col w-full gap-2">
                <h1 class="text-4xl font-bold text-gray-800">Payment</h1>
                <div class="flex gap-2">
                    <a href="{{$bill->payment->image}}" class="venobox">
                        <img src="{{$bill->payment->image}}" alt="" srcset="" class="object object-center h-32 w-auto">
                    </a>

                        <h1>Ref # : {{$bill->payment->ref_number}}</h1>
                </div>
            </div>
            @endif

        </div>

    </div>
</x-admin-layout>
