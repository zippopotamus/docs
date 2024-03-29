@extends('_layouts.master-w-nav')

@section('nav-toggle')
    @include('_nav.menu-toggle')
@endsection

@section('body')
<section class="container max-w-8xl mx-auto px-6 md:px-8 py-4">
    <div class="flex flex-col lg:flex-row">
        <nav id="js-nav-menu" class="nav-menu hidden lg:block">
            @include('_nav.menu', ['items' => $page->navigation])
        </nav>

        <div class="DocSearch-content w-full lg:w-3/5 break-words pb-16 lg:pl-4" v-pre>
            @yield('content')
        </div>
    </div>
</section>
@endsection

@push("scripts")
    <script>
        document.querySelectorAll("a").forEach((a) => {
            if (a.href === location.href) {
                a.classList.add("current");
            }
        });
    </script>
@endpush