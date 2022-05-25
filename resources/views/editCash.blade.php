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
            <h1 class="transaction__title">Edit your transaction</h1>
        </section>
        <section class="transaction__posts">
            <div class="transaction__add">
                <form action="/transactions/{{ $transaction->id }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <label for="title">Date</label>
                    <input type="date" id="title" name="date" value="{{ucfirst($transaction->label)}}" placeholder="Equipment title">
                    <label for="description">Libelle</label>
                    <input type="text" id="description" value="{{ucfirst($transaction->label)}}" name="libelle" placeholder="Equipment description">
                    <label for="image">Caisse : </label>
                    <select name="caisse" id="">
                        <option value="">Recette</option>
                        <option value="">Dépense</option>
                    </select>
                    <label for="image">Montant : </label>
                    <input type="number" step=".01" name="montant" id="image">
                    <input type="submit" id="submit" value="Update transaction">
                </form>
            </div>
        </section>
    </div>


</x-app-layout>

