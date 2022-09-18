<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>* {{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		@if ($status)
			<div class="alert alert-primary">
		        <ul>
		            <li>{{ __('custom.created') }}</li>
		        </ul>
		    </div>
		@endif
      </div>
    </div>
  </div>
</div>
<script>
@if ($errors->any() || $status)
	var myModal = new bootstrap.Modal(document.getElementById("myModal"), {});
	document.onreadystatechange = function () {
	  myModal.show();
	};
@endif
@if ($status)
    setTimeout(function(){ window.location = "{{ route('person.index') }}"; }, 3000);
@endif
</script>