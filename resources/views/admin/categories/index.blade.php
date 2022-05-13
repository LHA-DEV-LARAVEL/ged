<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des catégories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('categories.create') }}">Ajouter une catégorie</a>
                    <div class="container m-4">
                        <table>
                            <thead>
                                <tr>Nom de la catégorie</tr>
                                <tr>Actions</tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $categorie)
                                <tr>
                                    <td>{{ $categorie->name }}</td>
                                    <td>
                                        <a href="{{ route('categories.show', $categorie) }}">Consulter</a>
                                        <a href="{{ route('categories.edit', $categorie) }}">Modifier</a>
                                        <form action="{{ route('categories.delete', $categorie) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Supprimer">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
