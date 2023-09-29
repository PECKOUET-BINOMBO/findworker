@extends('layouts.app')

@section('content')

@if(Auth::user()->role_id == 1)

<div class="auth4-2">
    <form method="POST" action="{{ route('prestataire.store') }}" class="w-full max-w-sm mx-auto rounded-lg border shadow-md p-5 mb-5" enctype="multipart/form-data">
        @csrf
        <h1 class="font-semibold text-3xl text-per mb-6 text-center">Mon offre</h1>

        <div class="mb-4">
            <label for="name" class="block font-semibold text-gray-700 mb-2">Nom</label>
            <input id="name" type="text" name="name" class="shadow border rounded w-full p-2" value="{{ old('name') }}" autocomplete="name" placeholder="Titre" autofocus>
            @error('name')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block font-semibold text-gray-700 mb-2">Email</label>
            <input id="email" type="email" name="email" class="shadow border rounded w-full p-2" value="{{ old('email') }}" autocomplete="email" placeholder="Titre" autofocus>
            @error('email')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tel" class="block font-semibold text-gray-700 mb-2">Téléphone</label>
            <input id="tel" type="tel" name="tel" class="shadow border rounded w-full p-2" value="{{ old('tel') }}" autocomplete="tel" placeholder="Titre" autofocus>
            @error('tel')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tel2" class="block font-semibold text-gray-700 mb-2">Téléphone 2</label>
            <input id="tel2" type="tel2" name="tel2" class="shadow border rounded w-full p-2" value="{{ old('tel2') }}" autocomplete="tel2" placeholder="Titre" autofocus>
            @error('tel2')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="service" class="block font-semibold text-gray-700 mb-2">Titre</label>
            <input id="service" type="service" name="service" class="shadow border rounded w-full p-2" value="{{ old('service') }}" autocomplete="service" placeholder="Titre" autofocus>
            @error('service')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block font-semibold text-gray-700 mb-2">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="shadow border rounded w-full p-2" value="{{ old('description') }}" autocomplete="description" placeholder="Titre" autofocus></textarea>
            @error('description')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category" class="block font-semibold text-gray-700 mb-2">Catégorie</label>

            <select name="category" id="category" class=" bg-gray-200 border-2 w-full p-4 rounded-lg shadow @error('category') border-red-500 @enderror" value="{{ old('category') }}" autocomplete="category" placeholder="Titre" autofocus>
                <option value="">Choisir une catégorie</option>
                <option value="Accueil">Accueil - Sécrétariat</option>
                <option value="Agent immobilier">Agent immobilier</option>
                <option value="Agriculture">Agriculture</option>
                <option value="Architecte">Architecte</option>
                <option value="Audiovisuel">Audiovisuel</option>
                <option value="Boulangerie">Boulangerie</option>
                <option value="Caisse">Caissier - Caissière</option>
                <option value="Chauffeur">Chauffeur</option>
                <option value="Coiffure">Coiffure</option>
                <option value="Commercial">Commercial</option>
                <option value="Cuisine">Cuisine</option>
                <option value="Couture">Couture</option>
                <option value="Community management">Community management</option>
                <option value="Comptabilité">Comptabilité</option>
                <option value="Déménagement">Déménagement</option>
                <option value="Décoration">Décoration</option>
                <option value="Education(Enseignement)">Education(Enseignement)</option>
                <option value="Esthétique">Esthétique</option>
                <option value="Electricité">Electricité</option>
                <option value="Employé de rayon">Employé de rayon</option>
                <option value="Gardiennage">Gardiennage</option>
                <option value="Imprimerie">Imprimerie</option>
                <option value="Infographie graphiste">Infographiste - graphiste</option>
                <option value="Informatique">Informatique - web</option>
                <option value="Espace verte">Espace verte</option>
                <option value="Lavage mobilier">Lavage mobilier</option>
                <option value="Lavage vêtements">Lavage vêtements</option>
                <option value="Lavage véhicules">Lavage véhicules</option>
                <option value="Livraison">Livraison</option>
                <option value="Location">Location espace et mobilier</option>
                <option value="Maçonnerie">Maçonnerie</option>
                <option value="matiere">Métallurgie - sidérurgie - plasturgie</option>
                <option value="Marketing">Marketing</option>
                <option value="Menuiserie">Menuiserie</option>
                <option value="Ménage">Ménage</option>
                <option value="Maintenance informatique">Maintenance informatique</option>
                <option value="Nounou">Nounou</option>
                <option value="Peinture">Peinture</option>
                <option value="Plomberie">Plomberie</option>
                <option value="Plâtrerie/Enduit">Plâtrerie/Enduit</option>
                <option value="Photographie">Photographie</option>
                <option value="Pompiste station">Pompiste station</option>

                <option value="Réparation de véhicules">Réparation de véhicules</option>
                <option value="Réparations électroménagers">Réparation électroménagers</option>
                <option value="Serveur">Serveur - serveuse</option>
                <option value="Services événementiels">Services événementiels</option>
                <option value="Sport">Sport</option>
                <option value="Technicien en froid">Technicien en froid</option>
                <option value="Traduction">Traduction</option>
                <option value="Vitrerie">Vitrerie</option>
                <option value="Vétérinaire">Vétérinaire</option>
                <option value="Autres">Autres</option>
            </select>
            @error('category')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-per text-white hover:bg-orange-700 transition ease-in-out duration-500 rounded-md shadow-md w-full block px-4 py-2 mt-3">Ajouter l'annonce</button>
    </form>
</div>
@else
<div class="auth2">
    <form method="POST" action="{{ route('Jobs.store') }}" class="w-full max-w-sm mx-auto rounded-lg border shadow-md p-5 mb-5" enctype="multipart/form-data">
        @csrf
        <h1 class="font-semibold text-3xl text-per mb-6 text-center">Ma demande</h1>

        <div class="mb-4">
            <label for="title" class="block font-semibold text-gray-700 mb-2">Titre de l'annonce</label>
            <input id="title" type="text" name="title" class="shadow border rounded w-full p-2" value="{{ old('title') }}" autocomplete="title" placeholder="Titre" autofocus>
            @error('title')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="name" class="block font-semibold text-gray-700 mb-2">Description</label>
            <textarea name="description" id="description" class="shadow border rounded w-full p-2"></textarea>
            @error('description')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="name" class="block font-semibold text-gray-700 mb-2">Prix</label>
            <input id="price" type="text" name="price" class="shadow border rounded w-full p-2" value="{{ old('price') }}" autocomplete="price" placeholder="Prix">
            @error('price')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="category" class="block font-semibold text-gray-700 mb-2">Catégorie</label>

            <select name="category" id="category" class=" bg-gray-200 border-2 w-full p-4 rounded-lg shadow @error('category') border-red-500 @enderror" value="{{ old('category') }}" autocomplete="category" placeholder="Titre" autofocus>
                <option value="">Choisir une catégorie</option>
                <option value="Accueil">Accueil - Sécrétariat</option>
                <option value="Agent immobilier">Agent immobilier</option>
                <option value="Agriculture">Agriculture</option>
                <option value="Architecte">Architecte</option>
                <option value="Audiovisuel">Audiovisuel</option>
                <option value="Boulangerie">Boulangerie</option>
                <option value="Caisse">Caissier/Caissière</option>
                <option value="Chauffeur">Chauffeur</option>
                <option value="Coiffure">Coiffure</option>
                <option value="Commercial">Commercial</option>
                <option value="Cuisine">Cuisine</option>
                <option value="Couture">Couture</option>
                <option value="Community management">Community management</option>
                <option value="Comptabilité">Comptabilité</option>
                <option value="Déménagement">Déménagement</option>
                <option value="Education">Education (Enseignement)</option>
                <option value="Décoration">Décoration</option>
                <option value="Esthétique">Esthétique</option>
                <option value="Electricité">Electricité</option>
                <option value="Employé de rayon">Employé de rayon</option>
                <option value="Gardiennage">Gardiennage</option>
                <option value="Imprimerie">Imprimerie</option>
                <option value="Infographie graphiste">Infographiste - graphiste</option>
                <option value="Informatique">Informatique - web</option>
                <option value="Espace verte">Espace verte</option>
                <option value="Lavage mobilier">Lavage mobilier</option>
                <option value="Lavage vêtements">Lavage vêtements</option>
                <option value="Lavage véhicules">Lavage véhicules</option>
                <option value="Livraison">Livraison</option>
                <option value="Location">Location espace et mobilier</option>
                <option value="Maçonnerie">Maçonnerie</option>
                <option value="matiere">Métallurgie - sidérurgie - plasturgie</option>
                <option value="Marketing">Marketing</option>
                <option value="Menuiserie">Menuiserie</option>
                <option value="Ménage">Ménage</option>
                <option value="Maintenance informatique">Maintenance informatique</option>
                <option value="Nounou">Nounou</option>
                <option value="Peinture">Peinture</option>
                <option value="Plomberie">Plomberie</option>
                <option value="Plâtrerie/Enduit">Plâtrerie/Enduit</option>
                <option value="Photographie">Photographie</option>
                <option value="Pompiste station">Pompiste station</option>
                <option value="Programmation">Programmation</option>
                <option value="Réparation de véhicules"></option>
                <option value="Réparations électroménagers">Réparation électroménagers</option>
                <option value="Serveur">Serveur - serveuse</option>
                <option value="Services événementiels">Services événementiels</option>
                <option value="Sport">Sport</option>
                <option value="Technicien en froid">Technicien en froid</option>
                <option value="Traduction">Traduction</option>
                <option value="Vétérinaire">Vétérinaire</option>
                <option value="Vitrerie">Vitrerie</option>
                <option value="Autres">Autres</option>
            </select>



            @error('category')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="bg-per text-white hover:bg-orange-700 transition ease-in-out duration-500 rounded-md shadow-md w-full block px-4 py-2 mt-3">Ajouter l'annonce</button>
    </form>
</div>
@endif

@endsection
