<div>

    <div class="bg-per3 px-3 py-5 mb-4 shadow-sm hover:shadow-md rounded border-2 border-gray-300">
        <div class="flex" style="margin-bottom:1%; align-items:center;">
            <div class="img-profil">
                <img src="{{asset('profile-pictures/'.$job->user->profile_picture)}}" alt="">

            </div>
            <h2 class="text-xl font-semibold text-per" style="display:flex; align-items:center; margin-left:1%;">

                {{$job->title}}
            </h2>

        </div>
        <p class="text-md text-per2 font-semibold">{{$job->description}}</p>

        <span class="text-per3 text-sm font-normal">
            Il y a {{ $job->created_at->diffForHumans() }}

        </span>

        <div class="flex items-center">
            <!-- <span class="h-2 w-2 bg-per2 rounded-full mr-1 mt-1"></span>-->
            <a href="{{route('Jobs.show', $job->id)}}" class="text-per font-medium">Consulter la demande<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
  <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
</svg>

            </a>
        </div>
    </div>
</div>
