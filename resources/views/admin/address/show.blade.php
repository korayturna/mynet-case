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
					                <th>{{ __('custom.address') }}</th>
					                <th>{{ __('custom.post_code') }}</th>
					                <th>{{ __('custom.country_name') }}</th>
					                <th>{{ __('custom.city_name') }}</th>
					            </tr>
					        </thead>
					        <tbody>
					            @forelse($address as $var)
					                <tr>
					                    <td>{{ $var->address }}</td>
					                    <td>{{ $var->post_code }}</td>
					                   	<td>{{ $var->country_name }}</td>
					                   	<td>{{ $var->city_name }}</td>
					                </tr>
					            @empty
					                <tr>
					                    <td colspan="3">{{ __('custom.personnotexist')  }}</td>
					                </tr>
					            @endforelse
					        </tbody>
					    </table>
					</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
