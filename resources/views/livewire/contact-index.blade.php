<div>

	@if(session('status'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{ session('status') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif
	
	@if($statusUpdate == FALSE)
	<livewire:contact-create></livewire:contact-create>
	@else 
	<livewire:contact-update></livewire:contact-update>
	@endif

	<hr>

	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Nama</th>
				<th scope="col">Phone</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			@foreach($contacts as $contact)
			<tr>
				<th scope="row">{{ $i++ }}</th>
				<td>{{ $contact->name }}</td>
				<td>{{ $contact->phone }}</td>
				<td>
					<button wire:click="getContact({{ $contact->id }})" type="submit" class="btn btn-sm btn-info text-white">Update</button>
					<button wire:click="destroy({{ $contact->id }})" type="submit" class="btn btn-sm btn-danger text-white">Delete</button>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	
	{{ $contacts->links() }}

</div>
