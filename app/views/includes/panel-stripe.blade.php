<div id="panel" class="stripe">

	@foreach($photos as $photo)
		<div class="item h2">
			<div class="layer" data-depth="0.2">
				<a href='{{ URL::to("/photos/{$photo->id}") }}'>
					<img src='{{ URL::to("/arquigrafia-images/{$photo->id}_micro.jpg") }}'
						data-src='{{ URL::to("/arquigrafia-images/{$photo->id}_home.jpg") }}' title="{{ $photo->name }}">
				</a>
				<div class="item-title">
					<p>{{ $photo->name }}</p>
					@if (Auth::check() && !Session::has('institutionId'))
						<a id="title_plus_button" class="title_plus" href="{{ URL::to('/albums/get/list/' . $photo->id)}}" title="Adicionar aos meus álbuns"></a>
					@endif
					
					@if (Auth::check() && ((Auth::id() == $photo->user_id && !isset($photo->institution_id) && !Session::has('institutionId')) ||
					 ( Session::has('institutionId') && Session::get('institutionId') == $photo->institution_id) ) )
							@if ( isset($album) )
								<a id="title_delete_button" class="title_delete photo" href="{{ URL::to('/albums/' . $album->id . '/photos/' . $photo->id . '/remove') }}" title="Excluir imagem"></a>
							@else
								<a id="title_delete_button" class="title_delete photo" href="{{ URL::to('/photos/' . $photo->id) }}" title="Excluir imagem"></a>
							@endif
					@endif
					
					@if (Auth::check() && $photo->institution_id !="" && Session::get('institutionId') == $photo->institution_id)
					<a id="title_edit_button" href="{{ URL::to('/photos/' . $photo->id . '/editInstitutional')}}" title="Editar imagem"></a>
					@elseif (Auth::check() && Auth::id() == $photo->user_id &&  !Session::has('institutionId') && !isset($photo->institution_id)  )
					<a id="title_edit_button" href="{{ URL::to('/photos/' . $photo->id . '/edit')}}" title="Editar imagem"></a>
					@endif
				</div>
			</div>

		</div>

	@endforeach

</div>
<div class="panel-back"></div>
<div class="panel-next"></div>