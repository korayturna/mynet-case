<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
	             	<div class="container">
	             		<table class="table table-hover table-bordered data-table">
					        <thead>
					            <tr>
					                <th>{{ __('custom.name') }}</th>
					                <th>{{ __('custom.gender') }}</th>
					                <th>{{ __('custom.birthday') }}</th>

					                <th colspan='3'></th>
					            </tr>
					        </thead>
					        <tbody>
					            @forelse($persons as $person)
					                <tr>
					                    <td>{{ $person->name }}</td>
					                    <td>{{ __('custom.'.$person->gender) }}</td>
					                   	<td>{{ date('d/m/Y', strtotime($person->birthday)) }}</td>
					                    <td><a href="{{ route('person.edit', ['id' => $person->id, 'page' => $page]) }}" title="Güncelle"><i class="bi bi-pencil"></i></a></td>
					                    <td><a href="{{ route('person.delete', ['id' => $person->id, 'page' => $page]) }}" title="Sil"><i class="bi bi-trash"></i></a></td>
					                    <td><a href="{{ route('address.create', ['id' => $person->id, 'page' => $page]) }}" title="Adres Ekle"><i class="bi bi-plus-square"></i></a></td>
					                </tr>
					            @empty
					                <tr>
					                    <td colspan="3">{{ __('custom.personnotexist')  }}</td>
					                </tr>
					            @endforelse
					        </tbody>
					    </table>
					</div>
					{!! $persons->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
