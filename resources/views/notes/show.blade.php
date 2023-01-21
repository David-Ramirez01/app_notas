@extends('layouts.layouts')

@section('title-app', 'Notes: ' . $notes->title)

@section('content')

	<div class="container mx-auto p-3">

		<div class="text-center mt-4 p-2 mt-4 p-2">
			<h1 class="text-4xl">
				Details Note: <strong> {{ $notes->title }} </strong>
			</h1>
		</div>


		<div class="w-1/2 mx-auto rounded overflow-hidden grid grid-cols-2 justify-items-center divide-x divide-gray-500  bg-gray-100 my-5">

			<div class="my-4 p-4">
				<div class="font-bold text-xl mb-2"><a href="{{ route('notes.show', $notes) }}"> {{ $notes->title }} </a></div>
				<div class="w-auto">
					<p class="text-gray-700 text-base">
						{{ $notes->body }}
					</p>
				</div>

				{{-- Botones de Borrar y actualizar --}}
				<div class="p-4 mt-4 flex w-full space-x-2">

					<div class="bg-green-500 hover:bg-green-700 text-white text-sm text-center font-bold p-2 rounded-full">
						<a class="btn " role="button" href="{{ route('notes.edit', $notes) }}">
							Actualizar Nota
						</a>
					</div>

					<div class="bg-red-500 hover:bg-red-700 text-white text-sm text-center font-bold p-2 rounded-full">
						<form action="{{ route('notes.destroy', $notes) }}" method="POST">
							@csrf
							@method('delete')
							<button type="submit"> Borra Nota </button>
						</form>
					</div>
				</div>
			</div>

			{{-- Área de Fechas y Progreso de la tare --}}
			<div class="my-4 p-4 justify-items-center">
				<p class="text-xs text-gray-500 my-4">
					<i class="fas fa-calendar-day"></i> Inicio: {{ $notes->created_at->diffForHumans() }}
				</p>
				{{-- <p class="text-xs text-gray-500 my-4">
					<i class="fas fa-sync-alt"></i> Actulización {{ $notes->updated_at->diffForHumans() }}
				</p> --}}

				<form action="">
					<input type="checkbox" name="true">
					<input type="submit" value="Tarea Lista">
				</form>
			</div>
		</div>


	</div>


	<div class="grid justify-items-center p-5">
	<a href="{{ route('notes.index') }}" > <<< Volver a Notas </a>
	<a href="{{ route('notes.edit', $notes) }}"> Actualizar Nota </a>
	</div>
@endsection()