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
	             		@include('shared.alert', ['message' => 'created'])
	             		<form action="{{ route('address.create', ['id' => $id]) }}" method="POST">
					        @csrf
					        <input type="hidden" name="person_id" value="{{ $id }}" />
					         <div class="row">
					            <div class="col-xs-12 col-sm-12 col-md-12">
					                <div class="form-group">
					                    <strong>{{ __('custom.address') }}</strong> 
					                    <textarea name="address" value="{{ old('address') }}" class="form-control" ></textarea>
					                </div>
					            </div>
					            <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
					                <div class="form-group">
					                    <strong>{{ __('custom.post_code') }}</strong>
					                    <input type="text" name="post_code" value="{{ old('post_code') }}" class="form-control" >
					                </div>
					            </div>
					            <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
					                <div class="form-group">
					                    <strong>{{ __('custom.country_name') }}</strong>
					                    <input type="text" name="country_name" value="{{ old('country_name') }}" class="form-control" >
					                </div>
					            </div>
					            <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
					                <div class="form-group">
					                    <strong>{{ __('custom.city_name') }}</strong>
					                    <input type="text" name="city_name" value="{{ old('city_name') }}" class="form-control" >
					                </div>
					            </div>
					            <div class="col-xs-12 col-sm-12 col-md-12 text-end mt-4">
					              	<button type="submit" class="btn btn-primary">{{ __('custom.submit') }}</button>
					            </div>
					        </div>
					    </form>
					</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				{{ __('custom.delete_confirm') }}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('custom.no') }}</button>
				<a href="" id="delete-confirm" type="button" class="btn btn-danger btn-ok">{{ __('custom.yes') }}</a>
			</div>
		</div>
	</div>
</div>