@extends('layouts.layouts')

@section('title-app', 'Create Notes')

@section('content')

	<div class="grid justify-items-center p-5">
		<h2 class="text-4xl"> Formulario para crear notas</h2>

		<form class="bg-gray-50 p-3 rounded-lg m-5" action="{{ route('notes.store') }}" method="POST">
		@csrf
		<input type="hidden" name="user_id" value="{{ Auth::id() }}">

		<input class="border border-gray-400 focus-within:text-gray-800 p-3 w-full" type="text" name="title" placeholder="Titulo de la Nota" value="{{ old('title') }}">
		@error('title')
			<br>
			<small> * {{ $message }} </small>
		@enderror

		<br><br>

		<textarea class="border border-gray-400 focus-within:text-gray-800 p-3 w-full" name="body" rows="10"> {{ old('body') }} </textarea>
		@error('body')
			<br>
			<small> * {{ $message }} </small>
		@enderror

		<br><br>

		<button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded  p-3 w-full"> Guardar Nota </button>
	</form>
</div>
@endsection