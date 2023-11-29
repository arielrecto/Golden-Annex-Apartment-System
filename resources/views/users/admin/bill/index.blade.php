<x-admin-layout>
    <div class="w-full h-full flex flex-col gap-2">
        <div class="flex w-full items-center justify-between">
            <h1 class="text-lg font-bold text-gray-800">
                Bills
            </h1>
            <div class="flex items-center w-96">
                <form action="{{route('admin.bill.index')}}" method="get" class="w-full flex items-center">
                    {{-- @csrf --}}
                    <select class="select select-bordered w-full bg-gray-100" name="month">
                        <option disabled selected>Select Month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4" >April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                      <button class="btn btn-accent">Filter</button>
                </form>
            </div>
            <a href="{{ route('pdf.bills.download') }}?month={{Request::get('month')}}"
                class="btn btn-xs bg-blue-500 border-none hover:bg-blue-600 text-white">
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
                            <th>Room Number</th>
                            <th>Tenant</th>
                            <th>bill</th>
                            <th>metric type</th>
                            <th>previous reading</th>
                            <th>current reading</th>
                            <th>reading</th>
                            <th>rate</th>
                            <th>amount</th>
                            <th>status</th>
                            <th>Balance</th>

                            {{-- <th>Status</th>
                            <th>Tenant</th>
                            <th>Household People</th> --}}
                        </tr>
                    </thead>
                    <tbody>


                        @forelse ($bills as $bill)


                            <tr>
                                <th>1</th>
                                <td>{{ $bill->room->room_number }}</td>
                                <td>{{ $bill->room->user->name ?? 'Previos Tenant' }}</td>
                                <td>{{ $bill->name }}</td>
                                <td>{{ $bill->metric_type ?? '-'}}</td>
                                <td>{{ $bill->previous_reading ?? '-' }}</td>
                                <td>{{ $bill->current_reading ?? '-' }}</td>
                                <td>{{ $bill->reading ?? '-' }}</td>
                                <td>{{ $bill->metric_rate ?? '-' }}</td>
                                <td>{{ $bill->amount }}</td>
                                <td>{{ $bill->status }}</td>
                                <td>{{ $bill->balance }}</td>
                                <td>{{ $bill->room->room_number }}</td>
                                <td>{{ $bill->room->user->name ?? 'Previos Tenant' }}</td>
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
                                <td colspan="3">
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
