@section('styles')
    <link rel="stylesheet" href="{{ asset('css/transaction.css') }}">
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="transaction">
        <section class="transaction__header">
            <h1 class="transaction__title">Add your transaction</h1>
            @if($errors->any())
                <h4 style="color: red">{{$errors->first()}}</h4>
            @endif
        </section>
        <section class="transaction__posts">
            <div class="transaction__add">
                <form action="/transactions" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('POST')

                    <label for="title">Date</label>
                    <input type="date" id="title" name="date"  placeholder="Equipment title">
                    <label for="description">Libelle</label>
                    <input type="text" id="description" name="libelle" placeholder="Equipment description">
                    <label for="image">Caisse : </label>

                    <select name="caisse" id="">
                        <option value="recette" >Recette</option>
                        <option value="depense ">Dépense</option>
                    </select>
                    <label for="image">Montant : </label>
                    <input type="number" step=".01"  name="montant" id="image">
                    <input type="submit" id="submit" value="Add transaction">
                </form>
            </div>
        </section>
    </div>
</x-app-layout>

