<x-tenant-layout>
    <div class="w-full h-full flex flex-col gap-2 relative" x-data="printPDF">
        <h1>
            Bill -
            <span class="font-bold text-lg text-gray-800 capitalize">
                {{ $bill->name }}
            </span>
        </h1>
        <div class="flex flex-col gap-2">
            <div class="flex justify-between items-center">
                <h1 class="text-lg text-gray-700 font-bold py-2">
                    <span>
                        <a href="{{ route('tenant.dashboard') }}"
                            class="btn btn-xs bg-blue-500 hover:bg-blue-600 text-white duration-700 border-none">
                            <i class="fi fi-rr-arrow-small-left"></i>
                        </a>
                    </span>
                    Bill Information

                </h1>
                <div class="flex items-center gap-2">
                    <button class="btn btn-xs btn-accent" @click="toggle = !toggle">
                        <i class="fi fi-rr-money-bill-wave"></i>
                    </button>
                    <a href="{{route('pdf.bill', ['bill' => $bill->id])}}">
                        <button class="btn btn-xs bg-blue-500 hover:bg-blue-600 text-white duration-700 border-none" >
                            <i class="fi fi-rr-print"></i>
                        </button>
                    </a>

                </div>

            </div>

            <div>

                <div  id="element-print">
                    <h1>
                        <span>
                            Name :
                            <span style="color: black">
                                {{ $bill->name }}
                            </span>
                        </span>
                    </h1>
                    <h1>
                        <span>
                            Amount:
                            <span style="color:black">
                                {{ $bill->amount }}
                            </span>

                        </span>
                    </h1>
                    <h1>
                        <span>
                            Due Date: <span style="color: black">
                                {{ $bill->due_date }}
                            </span>

                        </span>
                    </h1>
                    <h1>
                        <span>
                            Tenant Name: <span style="color: black">
                                {{ $bill->room->user->name }}
                            </span>

                        </span>
                    </h1>
                    <h1>
                        <span>
                            Room Number: <span style="color:
                                black">
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

        <div class="absolute z-10 w-full h-full " x-show="toggle" x-cloak @click.outside="toggle = !toggle">
            <div class="w-full h-full backdrop-blur-sm bg-white/30 flex justify-center items-center">
                <form action="{{route('tenant.payment.store')}}" enctype="multipart/form-data" method="post" class="bg-white shadow-lg rounded-lg h-96 w-96 flex flex-col gap-2 p-4">
                    <h1 class="text-4xl font-bold text-gray-600 w-full text-center">
                        Payment
                    </h1>
                    @csrf
                    <div class="flex flex-col gap-2">
                        <label for="">Ref Number</label>
                        <input type="text" class="input w-full bg-gray-100" name="ref_number" placeholder="Ref Number">
                        @if($errors->has('ref_number'))
                        <p class="text-xs text-red-500">
                            {{$errors->first('ref_number')}}
                        </p>
                        @endif
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for=""><i class="fi fi-rr-clip"></i> Attach Image</label>
                        <input type="file" name="image" class="file-input file-input-bordered file-input-info w-full bg-gray-100" />
                        @if($errors->has('image'))
                        <p class="text-xs text-red-500">
                            {{$errors->first('image')}}
                        </p>
                        @endif
                    </div>
                    <input type="hidden" name="bill_id" value="{{$bill->id}}">

                    <button class="btn btn-accent">Pay</button>

                </form>
            </div>
        </div>

    </div>
</x-tenant-layout>
