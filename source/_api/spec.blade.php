@foreach ($paths as $path => $definition)
@foreach (['head', 'get', 'post', 'put', 'patch', 'delete'] as $operation)
@if ($definition->$operation === null)
@endif
@includeWhen($definition->$operation !== null, '_api.endpoint', ['definition' => $definition->$operation, 'operation' => $operation, 'path' => $path ])
@endforeach
@endforeach

