<x-tenant-layout>
    <div class="w-full h-full flex flex-col gap-2 relative" x-data="printPDF">
        @if (Session::has('reject'))
        <div role="alert" class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{Session::get('reject')}}</span>
          </div>
        @endif

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

                    @if($bill->balance !== 0)
                    <button class="btn btn-xs btn-accent" @click="toggle = !toggle">
                        <i class="fi fi-rr-money-bill-wave"></i>
                    </button>

                    @endif
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
                            Status:
                            <span style="color:black">
                                {{ $bill->status }}
                            </span>

                        </span>
                    </h1>
                    <h1>
                        <span>
                            Balance:
                            <span style="color:black">
                                {{ $bill->balance }}
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


            <div class="overflow-x-auto h-full w-full">
                <table class="table table-xs">
                    <thead class="text-gray-800">
                        <tr>
                            <th></th>
                            <th>Image</th>
                            <th>Ref Number</th>
                             <th>Amount</th>
                          {{--  <th>Tenant</th> --}}
                            {{-- <th>Status</th>
                            <th>Tenant</th>
                            <th>Household People</th> --}}
                        </tr>
                    </thead>
                    <tbody>


                       @forelse ($bill->payments()->get() as $payment)
                            <tr>
                                <th>1</th>
                                <td>
                                    <a href="{{$payment->image}}" class="venobox">
                                        <img src="{{$payment->image}}" alt="" srcset="" class="h-12 w-auto object object-center">
                                    </a>

                                </td>
                                <td>{{$payment->ref_number}}</td>
                                <td>{{$payment->amount}}</td>
                                {{-- <td>{{$bill->room->user->name ?? 'Previos Tenant'}}</td> --}}
                                {{-- <td>
                                    <div class="flex items-center gap-2">
                                        <a href="{{route('pdf.bill', ['bill' => $bill->id])}}" class="btn btn-xs bg-blue-500 border-none hover:bg-blue-700 duration-700 text-white">
                                            <i class="fi fi-rr-print"></i>
                                        </a>
                                        <button class="btn btn-xs btn-error"><i class="fi fi-rr-trash"></i></button>
                                    </div>
                                </td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td  colspan="3">
                                    <div class="flex justify-center text-gray-800">
                                      <h1 class="text-lg">
                                        No Payments
                                      </h1>
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
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
                        <label for="">Amount</label>
                        <input type="text" class="input w-full bg-gray-100" name="amount" placeholder="Amount">
                        @if($errors->has('amount'))
                        <p class="text-xs text-red-500">
                            {{$errors->first('amount')}}
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
