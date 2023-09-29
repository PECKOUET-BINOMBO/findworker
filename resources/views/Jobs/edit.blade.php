@extends('layouts.app')

@section('content')


<div class="auth2">
    <form method="POST" action="{{ route('Jobs.update2', $job->id) }}" class="w-full max-w-sm mx-auto rounded-lg border shadow-md p-5 mb-5" enctype="multipart/form-data">
    @method('PUT')
        @csrf
        <h1 class="font-semibold text-3xl text-per mb-6 text-center">Modifier ma demande</h1>

        <div class="mb-4">
            <label for="title" class="block font-semibold text-gray-700 mb-2">Titre de l'annonce</label>
            <input id="title" type="text" name="title" class="shadow border rounded w-full p-2" value="{{ $job->title }}" autocomplete="title" placeholder="Titre" autofocus>
            @error('title')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="name" class="block font-semibold text-gray-700 mb-2">Description</label>
            <textarea name="description" id="description" class="shadow border rounded w-full p-2">{{$job->description}}</textarea>
            @error('description')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="name" class="block font-semibold text-gray-700 mb-2">Prix</label>
            <input id="price" type="text" name="price" class="shadow border rounded w-full p-2" value="{{ $job->price }}" autocomplete="price" placeholder="Prix">
            @error('price')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="category" class="block font-semibold text-gray-700 mb-2">Catégorie</label>

            <select name="category" id="category" class=" bg-gray-200 border-2 w-full p-4 rounded-lg shadow @error('category') border-red-500 @enderror"  autocomplete="category" placeholder="Titre" autofocus>
                <option value="">Choisir une catégorie</option>
                <option value="Accueil" @if ($job->category == 'Accueil') selected @endif>Accueil - Sécrétariat</option>
                <option value="Agent immobilier" @if ($job->category == 'Agent immobilier') selected @endif>Agent immobilier</option>
                <option value="Agriculture" @if ($job->category == 'Agriculture') selected @endif>Agriculture</option>
                <option value="Architecte" @if ($job->category == 'Architecte') selected @endif>Architecte</option>
                <option value="Audiovisuel" @if ($job->category == 'Audiovisuel') selected @endif>Audiovisuel</option>
                <option value="Boulangerie" @if ($job->category == 'Boulangerie') selected @endif>Boulangerie</option>
                <option value="Caisse" @if ($job->category == 'Caisse') selected @endif>Caissier/Caissière</option>
                <option value="Chauffeur" @if ($job->category == 'Chauffeur') selected @endif>Chauffeur</option>
                <option value="Coiffure" @if ($job->category == 'Coiffure') selected @endif>Coiffure</option>
                <option value="Commercial" @if ($job->category == 'Commercial') selected @endif>Commercial</option>
                <option value="Cuisine" @if ($job->category == 'Cuisine') selected @endif>Cuisine</option>
                <option value="Couture" @if ($job->category == 'Couture') selected @endif>Couture</option>
                <option value="Community management" @if ($job->category == 'Community management') selected @endif>Community management</option>
                <option value="Comptabilité" @if ($job->category == 'Comptabilité') selected @endif>Comptabilité</option>
                <option value="Déménagement" @if ($job->category == 'Déménagement') selected @endif>Déménagement</option>
                <option value="Education" @if ($job->category == 'Education') selected @endif>Education (Enseignement)</option>
                <option value="Décoration" @if ($job->category == 'Décoration') selected @endif>Décoration</option>
                <option value="Esthétique" @if ($job->category == 'Esthétique') selected @endif>Esthétique</option>
                <option value="Electricité" @if ($job->category == 'Electricité') selected @endif>Electricité</option>
                <option value="Employé de rayon" @if ($job->category == 'Employé de rayon') selected @endif>Employé de rayon</option>
                <option value="Gardiennage" @if ($job->category == 'Gardiennage') selected @endif>Gardiennage</option>
                <option value="Imprimerie" @if ($job->category == 'Imprimerie') selected @endif>Imprimerie</option>
                <option value="Infographie graphiste" @if ($job->category == 'Infographie graphiste') selected @endif>Infographiste - graphiste</option>
                <option value="Informatique" @if ($job->category == 'Informatique') selected @endif>Informatique - web</option>
                <option value="Espace verte" @if ($job->category == 'Espace verte') selected @endif>Espace verte</option>
                <option value="Lavage mobilier" @if ($job->category == 'Lavage mobilier') selected @endif>Lavage mobilier</option>
                <option value="Lavage vêtements" @if ($job->category == 'Lavage vêtements') selected @endif>Lavage vêtements</option>
                <option value="Lavage véhicules" @if ($job->category == 'Lavage véhicules') selected @endif>Lavage véhicules</option>
                <option value="Livraison" @if ($job->category == 'Livraison') selected @endif>Livraison</option>
                <option value="Location" @if ($job->category == 'Location') selected @endif>Location espace et mobilier</option>
                <option value="Maçonnerie" @if ($job->category == 'Maçonnerie') selected @endif>Maçonnerie</option>
                <option value="matiere" @if ($job->category == 'matiere') selected @endif>Métallurgie - sidérurgie - plasturgie</option>
                <option value="Marketing" @if ($job->category == 'Marketing') selected @endif>Marketing</option>
                <option value="Menuiserie" @if ($job->category == 'Menuiserie') selected @endif>Menuiserie</option>
                <option value="Ménage" @if ($job->category == 'Ménage') selected @endif>Ménage</option>
                <option value="Maintenance informatique" @if ($job->category == 'Maintenance informatique') selected @endif>Maintenance informatique</option>
                <option value="Nounou" @if ($job->category == 'Nounou') selected @endif>Nounou</option>
                <option value="Peinture" @if ($job->category == 'Peinture') selected @endif>Peinture</option>
                <option value="Plomberie" @if ($job->category == 'Plomberie') selected @endif>Plomberie</option>
                <option value="Plâtrerie/Enduit" @if ($job->category == 'Plâtrerie/Enduit') selected @endif>Plâtrerie/Enduit</option>
                <option value="Photographie" @if ($job->category == 'Photographie') selected @endif>Photographie</option>
                <option value="Pompiste station" @if ($job->category == 'Pompiste station') selected @endif>Pompiste station</option>
                <option value="Programmation" @if ($job->category == 'Programmation') selected @endif>Programmation</option>
                <option value="Réparation de véhicules" @if ($job->category == 'Réparation de véhicules') selected @endif></option>
                <option value="Réparations électroménagers" @if ($job->category == 'Réparations électroménagers') selected @endif>Réparation électroménagers</option>
                <option value="Serveur" @if ($job->category == 'Serveur') selected @endif>Serveur - serveuse</option>
                <option value="Services événementiels" @if ($job->category == 'Services événementiels') selected @endif>Services événementiels</option>
                <option value="Sport" @if ($job->category == 'Sport') selected @endif>Sport</option>
                <option value="Technicien en froid" @if ($job->category == 'Technicien en froid') selected @endif>Technicien en froid</option>
                <option value="Traduction" @if ($job->category == 'Traduction') selected @endif>Traduction</option>
                <option value="Vétérinaire" @if ($job->category == 'Vétérinaire') selected @endif>Vétérinaire</option>
                <option value="Vitrerie" @if ($job->category == 'Vitrerie') selected @endif>Vitrerie</option>
                <option value="Autres" @if ($job->category == 'Autres') selected @endif>Autres</option>
            </select>



            @error('category')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="bg-per text-white hover:bg-orange-700 transition ease-in-out duration-500 rounded-md shadow-md w-full block px-4 py-2 mt-3">Modifier l'annonce</button>
    </form>
</div>


@endsection
