{{-- jquery is on vendor on the head the head --}}
<script src="{{ asset('assets/dist/js/vendor.js') }}"></script>
<script src="{{ asset('assets/dist/js/app.js') }}"></script>
<script src="{{ asset('assets/js/cpf&cnpj.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mask.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/select2.full.js') }}"></script>

<script type="text/javascript">

	{{-- confere se há erros no modal de criação e deixa o modal aberto --}}
	@if (isset($errors) && count($errors) > 0)
	$("#createmodal").modal();
	@endif

</script>
