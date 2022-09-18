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
	             		@include('shared.alert', ['message' => 'updated'])
	             		<form action="{{ route('person.edit',['id' => $person->id, 'page' => $page]) }}" method="POST">
					        @csrf
					         <div class="row">
					            <div class="col-xs-12 col-sm-12 col-md-12">
					                <div class="form-group">
					                    <strong>{{ __('custom.name') }}</strong>
					                    <input type="text" name="name" value="{{ $person->name }}" class="form-control" >
					                </div>
					            </div>
					            <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
					                <div class="form-group">
					                    <strong>{{ __('custom.gender') }}</strong>
					                    <select name="gender" class="form-select" aria-label="Default select example">
					                    @foreach (config('constants.genders') as $gender)
											<option value="{{ $gender }}" {{ ($gender == $person->gender)?'selected':'' }}>{{ __('custom.'.$gender) }}</option>
										@endforeach
										</select>
					                </div>
					            </div>
					            <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
					                <div class="form-group">
					                    <strong>{{ __('custom.birthday') }}</strong>
					                    <input type="text" name="birthday" value="{{ date('d/m/Y', strtotime($person->birthday)) }}" class="form-control" >
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