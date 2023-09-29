<div>
    <div class="bg-per3 px-3 py-5 mb-4 shadow-sm hover:shadow-md rounded border-2 border-gray-300">
    <div class="flex" style="margin-bottom:1%; align-items:center;">
            <div class="img-profil">
                <img src="{{asset('profile-pictures/'.$client->user->profile_picture)}}" alt="">
            </div>
            <h2 class="text-xl font-semibold text-per" style="display:flex; align-items:center;">

                {{$job->title}}
            </h2>

        </div>
        <p class="text-md text-per2 font-semibold">{{$client->description}}</p>

        <span class="text-per3 text-sm font-normal">
            Il y a {{ $client->created_at->diffForHumans() }}

        </span>
        <!-- <span class="text-sm text-per3 font-medium">
            {{number_format($job->price / 1, 0, ',', ' ')}} Fcfa
        </span> -->
        <div class="flex items-center">
            <!-- <span class="h-2 w-2 bg-per2 rounded-full mr-1 mt-1"></span>-->
            <a href="{{route('Jobs.prestataire.show', $client->id)}}" class="text-per font-medium">Consulter l'offre <!--<svg xmlns="http://www.w3.org/2000/svg" fill="#FF5733" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>-->
            </a>
        </div>
    </div>
</div>
