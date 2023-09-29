@extends('layouts.app')

@section('content')


<div class="auth4-2">
    <form method="POST" action="{{route('client.updateservice', $client->id) }}" class="w-full max-w-sm mx-auto rounded-lg border shadow-md p-5 mb-5" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <h1 class="font-semibold text-3xl text-per mb-6 text-center">Modifier mon offre</h1>

        <div class="mb-4">
            <label for="name" class="block font-semibold text-gray-700 mb-2">Nom</label>
            <input id="name" type="text" name="name" class="shadow border rounded w-full p-2" value="{{ $client->name}}" autocomplete="name" placeholder="Titre" autofocus>
            @error('name')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block font-semibold text-gray-700 mb-2">Email</label>
            <input id="email" type="email" name="email" class="shadow border rounded w-full p-2" value="{{ $client->email}}" autocomplete="email" placeholder="Titre" autofocus>
            @error('email')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tel" class="block font-semibold text-gray-700 mb-2">Téléphone</label>
            <input id="tel" type="tel" name="tel" class="shadow border rounded w-full p-2" value="{{ $client->tel}}" autocomplete="tel" placeholder="Titre" autofocus>
            @error('tel')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tel2" class="block font-semibold text-gray-700 mb-2">Téléphone 2</label>
            <input id="tel2" type="tel2" name="tel2" class="shadow border rounded w-full p-2" value="{{ $client->tel2}}" autocomplete="tel2" placeholder="Titre" autofocus>
            @error('tel2')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="service" class="block font-semibold text-gray-700 mb-2">Titre</label>
            <input id="service" type="service" name="service" class="shadow border rounded w-full p-2" value="{{ $client->service}}" autocomplete="service" placeholder="Titre" autofocus>
            @error('service')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block font-semibold text-gray-700 mb-2">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="shadow border rounded w-full p-2" value="" autocomplete="description" placeholder="Titre" autofocus>{{ $client->description}}</textarea>
            @error('description')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category" class="block font-semibold text-gray-700 mb-2">Catégorie</label>

            <select name="category" id="category" class=" bg-gray-200 border-2 w-full p-4 rounded-lg shadow @error('category') border-red-500 @enderror" value="{{ old('category') }}" autocomplete="category" placeholder="Titre" autofocus>
            <option value="">Choisir une catégorie</option>
                <option value="Accueil" @if ($client->category == 'Accueil') selected @endif>Accueil - Sécrétariat</option>
                <option value="Agent immobilier" @if ($client->category == 'Agent immobilier') selected @endif>Agent immobilier</option>
                <option value="Agriculture" @if ($client->category == 'Agriculture') selected @endif>Agriculture</option>
                <option value="Architecte" @if ($client->category == 'Architecte') selected @endif>Architecte</option>
                <option value="Audiovisuel" @if ($client->category == 'Audiovisuel') selected @endif>Audiovisuel</option>
                <option value="Boulangerie" @if ($client->category == 'Boulangerie') selected @endif>Boulangerie</option>
                <option value="Caisse" @if ($client->category == 'Caisse') selected @endif>Caissier/Caissière</option>
                <option value="Chauffeur" @if ($client->category == 'Chauffeur') selected @endif>Chauffeur</option>
                <option value="Coiffure" @if ($client->category == 'Coiffure') selected @endif>Coiffure</option>
                <option value="Commercial" @if ($client->category == 'Commercial') selected @endif>Commercial</option>
                <option value="Cuisine" @if ($client->category == 'Cuisine') selected @endif>Cuisine</option>
                <option value="Couture" @if ($client->category == 'Couture') selected @endif>Couture</option>
                <option value="Community management" @if ($client->category == 'Community management') selected @endif>Community management</option>
                <option value="Comptabilité" @if ($client->category == 'Comptabilité') selected @endif>Comptabilité</option>
                <option value="Déménagement" @if ($client->category == 'Déménagement') selected @endif>Déménagement</option>
                <option value="Education" @if ($client->category == 'Education') selected @endif>Education (Enseignement)</option>
                <option value="Décoration" @if ($client->category == 'Décoration') selected @endif>Décoration</option>
                <option value="Esthétique" @if ($client->category == 'Esthétique') selected @endif>Esthétique</option>
                <option value="Electricité" @if ($client->category == 'Electricité') selected @endif>Electricité</option>
                <option value="Employé de rayon" @if ($client->category == 'Employé de rayon') selected @endif>Employé de rayon</option>
                <option value="Gardiennage" @if ($client->category == 'Gardiennage') selected @endif>Gardiennage</option>
                <option value="Imprimerie" @if ($client->category == 'Imprimerie') selected @endif>Imprimerie</option>
                <option value="Infographie graphiste" @if ($client->category == 'Infographie graphiste') selected @endif>Infographiste - graphiste</option>
                <option value="Informatique" @if ($client->category == 'Informatique') selected @endif>Informatique - web</option>
                <option value="Espace verte" @if ($client->category == 'Espace verte') selected @endif>Espace verte</option>
                <option value="Lavage mobilier" @if ($client->category == 'Lavage mobilier') selected @endif>Lavage mobilier</option>
                <option value="Lavage vêtements" @if ($client->category == 'Lavage vêtements') selected @endif>Lavage vêtements</option>
                <option value="Lavage véhicules" @if ($client->category == 'Lavage véhicules') selected @endif>Lavage véhicules</option>
                <option value="Livraison" @if ($client->category == 'Livraison') selected @endif>Livraison</option>
                <option value="Location" @if ($client->category == 'Location') selected @endif>Location espace et mobilier</option>
                <option value="Maçonnerie" @if ($client->category == 'Maçonnerie') selected @endif>Maçonnerie</option>
                <option value="matiere" @if ($client->category == 'matiere') selected @endif>Métallurgie - sidérurgie - plasturgie</option>
                <option value="Marketing" @if ($client->category == 'Marketing') selected @endif>Marketing</option>
                <option value="Menuiserie" @if ($client->category == 'Menuiserie') selected @endif>Menuiserie</option>
                <option value="Ménage" @if ($client->category == 'Ménage') selected @endif>Ménage</option>
                <option value="Maintenance informatique" @if ($client->category == 'Maintenance informatique') selected @endif>Maintenance informatique</option>
                <option value="Nounou" @if ($client->category == 'Nounou') selected @endif>Nounou</option>
                <option value="Peinture" @if ($client->category == 'Peinture') selected @endif>Peinture</option>
                <option value="Plomberie" @if ($client->category == 'Plomberie') selected @endif>Plomberie</option>
                <option value="Plâtrerie/Enduit" @if ($client->category == 'Plâtrerie/Enduit') selected @endif>Plâtrerie/Enduit</option>
                <option value="Photographie" @if ($client->category == 'Photographie') selected @endif>Photographie</option>
                <option value="Pompiste station" @if ($client->category == 'Pompiste station') selected @endif>Pompiste station</option>
                <option value="Programmation" @if ($client->category == 'Programmation') selected @endif>Programmation</option>
                <option value="Réparation de véhicules" @if ($client->category == 'Réparation de véhicules') selected @endif></option>
                <option value="Réparations électroménagers" @if ($client->category == 'Réparations électroménagers') selected @endif>Réparation électroménagers</option>
                <option value="Serveur" @if ($client->category == 'Serveur') selected @endif>Serveur - serveuse</option>
                <option value="Services événementiels" @if ($client->category == 'Services événementiels') selected @endif>Services événementiels</option>
                <option value="Sport" @if ($client->category == 'Sport') selected @endif>Sport</option>
                <option value="Technicien en froid" @if ($client->category == 'Technicien en froid') selected @endif>Technicien en froid</option>
                <option value="Traduction" @if ($client->category == 'Traduction') selected @endif>Traduction</option>
                <option value="Vétérinaire" @if ($client->category == 'Vétérinaire') selected @endif>Vétérinaire</option>
                <option value="Vitrerie" @if ($client->category == 'Vitrerie') selected @endif>Vitrerie</option>
                <option value="Autres" @if ($client->category == 'Autres') selected @endif>Autres</option>
            </select>
            @error('category')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-per text-white hover:bg-orange-700 transition ease-in-out duration-500 rounded-md shadow-md w-full block px-4 py-2 mt-3">Modifier l'annonce</button>
    </form>
</div>

@endsection
