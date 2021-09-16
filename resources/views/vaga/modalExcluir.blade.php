<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$vaga->id}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
               </button>
			</div>
			<div class="modal-body">
                <h4 class="modal-title">Apagar vaga: {{$vaga->nome}}</h4>    
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <form action="{{route('delete_vaga', $vaga->id)}}" method="post">
                    @csrf
                    @method('DELETE')
				    <button type="submit" class="btn btn-danger">Excluir</button>
                </form> 
			</div>
		</div>
	</div>
</div>