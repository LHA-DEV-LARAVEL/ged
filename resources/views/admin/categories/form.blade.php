<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une catégorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (isset($categorie))
                        <form action="{{ route('categories.update', $categorie) }}" method="POST">
                            @csrf
                            @method('PUT')
                    @else
                            <form action="{{ route('categories.store') }}" method="post">
                                @csrf
                    @endif
                    <div class="py-4">
                        <label for="name" class="form-label">Nom de la categorie :</label>
                        <input type="text" name="name" id="name"
                            value="{{ isset($categorie) ? $categorie->name : '' }}" class="form-control">
                        @if ($errors->has('name'))
                            <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="py-3">
                        <input type="submit" value="Valider" class="btn btn-primary">
                        <input type="reset" value="Annuler" class="btn btn-secondary">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
