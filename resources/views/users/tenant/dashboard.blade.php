<x-tenant-layout>
    <div class="h-full w-auto flex flex-col gap-2">
        <div class="w-full flex items-center">
            <h1 class="font-bold text-gray-800">Overview</h1>
        </div>
        <div class="grid grid-flow-col grid-cols-3 gap-2">
            <div class="h-32 w-full rounded-lg bg-accent flex flex-col gap-2">
                <span class="p-2 text-white font-lg font-bold tacking-widest">
                    Household
                </span>
                <span class="truncate text-5xl tracking-wider text-white font-bold w-5/6 p-5">
                   {{Auth::user()->room->household_people ?? 0}}
                </span>
            </div>
            <div class="h-32 w-full rounded-lg bg-accent flex flex-col gap-2">
                <span class="p-2 text-white font-lg font-bold tacking-widest">
                    Total bill
                </span>
                <span class="truncate text-5xl tracking-wider text-white font-bold w-5/6 p-5">
                    ₱ {{$billTotal}}
                </span>
            </div>
            <div class="h-32 w-full rounded-lg bg-accent flex flex-col gap-2">
                <span class="p-2 text-white font-lg font-bold tacking-widest">
                    Announcement
                </span>
                <span class="truncate text-5xl tracking-wider text-white font-bold w-5/6 p-5">
                   {{$announcementTotal}}
                </span>
            </div>
        </div>

        <div class="w-full h-full flex gap-2 items-center">
            {{-- <div class="w-1/2 flex flex-col gap-2">
                    <h1 class="font-bold text-lg">Tenant</h1>
                    <div id="barchart" class="w-full h-full">

                    </div>
                </div> --}}
            <div class="w-full h-96 flex flex-col gap-2">
                <h1 class="font-bold text-lg capitalize">Bills</h1>
                <div class="overflow-x-auto h-full w-5/6">
                    <table class="table table-xs">
                        <thead class="text-gray-800">
                            <tr>
                                <th></th>
                                <th>name</th>
                                <th>metric type</th>
                                <th>previous reading</th>
                                <th>current reading</th>
                                <th>reading</th>
                                <th>rate</th>
                                <th>amount</th>
                                <th>status</th>
                                <th>balance</th>
                                <th>Due Date</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>


                            @forelse ($bills as $bill)
                                <tr class="text-gray-800">
                                    <th>{{$bill->id}}</th>
                                    <td>{{ $bill->name }}</td>
                                    <td>{{ $bill->metric_type ?? '-'}}</td>
                                    <td>{{ $bill->previous_reading ?? '-' }}</td>
                                    <td>{{ $bill->current_reading ?? '-' }}</td>
                                    <td>{{ $bill->reading ?? '-' }}</td>
                                    <td>{{ $bill->metric_rate ?? '-' }}</td>
                                    <td>{{ $bill->amount }}</td>
                                    <td>{{ $bill->status }}</td>
                                    <td>{{ $bill->balance }}</td>
                                    <td>{{ $bill->due_date}}</td>

                                    <td>
                                        <div class="flex items-center gap-2">
                                            <a href="{{route('tenant.bill.show', ['bill' => $bill->id])}}" class="btn btn-xs btn-accent text-white"> <i class="fi fi-rr-eye"></i></a>
                                            {{-- <button class="btn btn-xs bg-blue-500 border-none hover:bg-blue-600 duration-700 text-white"><i class="fi fi-rr-print"></i></button> --}}
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
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
    </div>
</x-tenant-layout>
