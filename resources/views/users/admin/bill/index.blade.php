<x-admin-layout>
    <div class="w-full h-full flex flex-col gap-2">
        <div class="flex w-full items-center justify-between">
            <h1 class="text-lg font-bold text-gray-800">
                Bills
            </h1>
            <a href="{{route('pdf.bills.download')}}" class="btn btn-xs bg-blue-500 border-none hover:bg-blue-600 text-white">
                <span>
                    <i class="fi fi-rr-print"></i>
                </span>
                {{-- <span>
                    Bill
                </span> --}}
            </a>
        </div>

        <div class="w-full h-96">
            <div class="overflow-x-auto h-full w-full">
                <table class="table table-xs">
                    <thead class="text-gray-800">
                        <tr>
                            <th></th>
                            <th>name</th>
                            <th>amount</th>
                            <th>staus</th>
                            <th>Balance</th>
                            <th>Room Number</th>
                            <th>Tenant</th>
                            {{-- <th>Status</th>
                            <th>Tenant</th>
                            <th>Household People</th> --}}
                        </tr>
                    </thead>
                    <tbody>


                       @forelse ($bills as $bill)
                            <tr>
                                <th>1</th>
                                <td>{{$bill->name}}</td>
                                <td>{{$bill->amount}}</td>
                                <td>{{$bill->status}}</td>
                                <td>{{$bill->balance}}</td>
                                <td>{{$bill->room->room_number}}</td>
                                <td>{{$bill->room->user->name ?? 'Previos Tenant'}}</td>
                                {{-- <td>
                                    <div class="flex items-center gap-2">
                                        <a href="{{route('pdf.bill', ['bill' => $bill->id])}}" class="btn btn-xs bg-blue-500 border-none hover:bg-blue-700 duration-700 text-white">
                                            <i class="fi fi-rr-print"></i>
                                        </a>
                                        <button class="btn btn-xs btn-error"><i class="fi fi-rr-trash"></i></button>
                                    </div>
                                </td>  --}}
                            </tr>
                        @empty
                            <tr>
                                <td  colspan="3">
                                    <div class="flex justify-center text-gray-800">
                                      <h1 class="text-lg">
                                        No Bills
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
