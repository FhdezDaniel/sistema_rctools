soy index de prueba 1

@forelse ($prueba1s as $prueba1)
    <li>{{ $prueba1->nombre }}</li>
    <li>{{ $prueba1->Suajemodelo->codigo}}</li>
@empty
    <p>No hay registros de libros en la bd</p>
@endforelse

