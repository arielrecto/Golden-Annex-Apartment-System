<div class="navbar bg-white rounded-lg">
    <div class="flex-1">
      <a class="btn btn-ghost text-xl">{{Auth::user()->name}} <span class="text-sm flex items-center font-light pt-1">| Tenant - Room : {{Auth::user()->room->room_number}}</span></a>
    </div>
    <div class="flex-none gap-2">
      {{-- <div class="form-control">
        <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
      </div> --}}
      <div class="dropdown dropdown-end">
        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
          <div class="w-10 rounded-full">
            <img alt="Tailwind CSS Navbar component" src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&w=600" />
          </div>
        </label>
        <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-white rounded-box w-52">
          {{-- <li>
            <a class="justify-between">
              Profile
              <span class="badge">New</span>
            </a>
          </li>
          <li><a>Settings</a></li> --}}
          <li>

            <form action="{{route('logout')}}" method="post">
                @csrf
                <button>Logout</button>
            </form>

        </li>
        </ul>
      </div>
    </div>
  </div>
