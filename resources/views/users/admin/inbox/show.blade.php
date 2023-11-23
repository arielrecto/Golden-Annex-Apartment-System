<x-admin-layout>
    <div class="flex flex-col space-y-2">
        <h1 class="text-3xl font-bold">
            Inbox - Show
        </h1>
        <div class="flex flex-col space-y-4">
            <h1 class="text-lg font-bold text-gray-800">
                <span>Email : </span>
                <span class="font-normal">
                    {{ $inbox->email }}
                </span>
            </h1>
            <p class="w-full text-gray-700 h-96 rounded-lg bg-gray-100 p-2">
                {{ $inbox->description }}
            </p>
        </div>


        <div class="w-full h-full bg-gray-100 rounded-lg p-2 flex flex-col gap-5">
            <form action="{{route('inbox.emailSend')}}" method="post" class="w-full h-full flex flex-col gap-4">

                <div class="flex justify-between items-center p-2">
                    <h1 class="text-3xl font-bold capitalize">
                        Response
                    </h1>

                    <button class="btn btn-xs bg-blue-500 border-none hover:bg-blue-700 duration-700 text-white"><i
                            class="fi fi-rr-envelope"></i></button>
                </div>

                @csrf

                <div class="flex flex-col gap-5">
                    <label for="" class="text-gray-600">Email</label>
                    <input type="text" class="input input-sm w-full bg-white" name="email" placeholder="Email"
                        value="{{ $inbox->email }}">
                </div>



                <div class="flex flex-col gap-5">
                    <label for="" class="text-gray-600"> Subject </label>
                    <input type="text" class="input input-sm w-full bg-white" name="subject" placeholder="Subject">
                </div>


                <div class="flex flex-col gap-5">
                    <label for="" class="text-gray-600"> Content </label>
                    <textarea class="textarea h-96 w-full bg-white" name="content">

                    </textarea>
                </div>


            </form>
        </div>
    </div>
</x-admin-layout>
