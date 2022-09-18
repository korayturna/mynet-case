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
	             		@include('shared.deleteconfirm')
	             		<table class="table table-hover table-bordered data-table">
					        <thead>
					            <tr>
					                <th>{{ __('custom.name') }}</th>
					                <th>{{ __('custom.gender') }}</th>
					                <th>{{ __('custom.birthday') }}</th>
					                <th colspan='4'></th>
					            </tr>
					        </thead>
					        <tbody>
					            @forelse($persons as $person)
					                <tr>
					                    <td>{{ $person->name }}</td>
					                    <td>{{ __('custom.'.$person->gender) }}</td>
					                   	<td>{{ date('d/m/Y', strtotime($person->birthday)) }}</td>
					                    <td><a href="{{ route('person.edit', ['id' => $person->id, 'page' => $page]) }}" title="Güncelle"><i class="bi bi-pencil"></i></a></td>
					                    <td><a href="#" id='delete-person' phref="{{ route('person.delete', ['id' => $person->id, 'page' => $page]) }}" data-bs-toggle="modal" data-bs-target="#deletemodal" title="Sil"><i class="bi bi-trash"></i></a></td>
					                    <td><a href="{{ route('address.create', ['id' => $person->id, 'page' => $page]) }}" title="Adres Ekle"><i class="bi bi-plus-square"></i></a></td>
					                    <td>@if ($person->post_code) <a href="{{ route('address.show', ['id' => $person->id, 'page' => $page]) }}" title="Adres Görüntüle"><i class="bi bi-card-list"></i></a>@endif</td>
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
<script type="text/javascript">
$(document).ready(function() {
	$('body').on('click', '#delete-person', function() {
		$('#delete-confirm').attr('href', $(this).attr('phref'));
	});
});
</script>