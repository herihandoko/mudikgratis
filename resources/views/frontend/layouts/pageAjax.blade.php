@foreach ($elements as $item)
   @include(@App\Models\PageComponent::find($item)->view, compact('page'))
@endforeach
