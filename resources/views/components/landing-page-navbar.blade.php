<div class="navbar bg-white fixed top-0 z-10">
    <div class="flex-1">
      <a class="btn btn-ghost text-xl"><span class="text-blue-400 font-bold">Golden Annex</span> <span class="text-gray-600">Apartment</span></a>
    </div>
    <div class="flex-none">
      <ul class="menu menu-horizontal px-1">
        <li class="capitalize">

           @if (Auth::user())
           <a href="{{route('home')}}">Go to Dashboard</a>
           @else
           <a href="{{route('login')}}">login</a>
           @endif

        </li>
      </ul>
    </div>
  </div>
