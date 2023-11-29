<div class="navbar bg-white fixed top-0 z-10 justify-between">
    <div class="">
      <a class="btn btn-ghost text-xl"><span class="text-blue-400 font-bold">Golden Annex</span> <span class="text-gray-600">Apartment</span></a>
    </div>
    <div class="flex space-x-10 text-gray-700">
        <a href="#home">HOME</a>
        <a href="#room">ROOM</a>
        <a href="#about">ABOUT</a>
        <a href="#contact">CONTACT</a>
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
