@if(session()->has('error'))
	<script>
		$(function() {
			swal('An error occured', '{{ session('error') }}', 'error')
		});
	</script>
@endif

@if(session()->has('message'))
		<script>
		$(function() {
			swal('Yay!', '{{ session('message') }}', 'success')
		});
	</script>

@endif