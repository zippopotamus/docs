## {{ trim($definition->summary) }} {#{{ Illuminate\Support\Str::slug($definition->summary) }}}

<div class="path flex">
    <div class="flex w-auto bg-red-600 p-1 px-2 text-white inline-block text-sm tracking-wide uppercase">{{ $operation }}</div>
    <code class="flex w-full p-1 px-2 text-base">{{ $path }}</code>
</div>

{!! $definition->description !!}

#### Path Parameters

Each path parameter is _required_.

<table class="w-full striped">
    <thead>
        <tr>
            <td>Parameter</td>
            <td>Description</td>
            <td>Example</td>
        </tr>
    </thead>
@foreach($definition->parameters as $param)
@if($param->in !== "path")
    @continue
@endif
    <tr>
        <td>{{ $param->name }}</td>
        <td>{{ $param->description }}</td>
        <td>
            {{ $param->example }}
        </td>
    </tr>
@endforeach
</table>

