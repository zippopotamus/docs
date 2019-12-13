@extends('_layouts.master')

@section('body')
<section class="container max-w-6xl mx-auto px-6 py-10 md:py-12">
    <div class="flex flex-col-reverse mb-10 lg:flex-row lg:mb-24">
        <div class="mt-8">
            <h1 id="intro-docs-template">{{ $page->siteName }}</h1>

            <h2 id="intro-powered-by-jigsaw" class="font-light mt-4">{{ $page->siteDescription }}</h2>

            <p class="text-lg">Gain valuable insights about your users' location by looking up their postal code. <br class="hidden sm:block">Easily enable location-based features in your application.</p>

            <div class="md:flex text-center md:text-left my-10">
                <a href="/docs/getting-started" title="{{ $page->siteName }} getting started" class="block md:flex md:w-auto w-full bg-red-600 hover:bg-red-700 font-normal text-white hover:text-white rounded mb-4 md:mb-0 md:mr-4 py-2 px-6 flex items-center justify-center">Get Started</a>

                <a href="https://github.com/zippopotamus" title="Zippopotam.us Github" class="block md:flex md:w-auto w-full bg-gray-100 hover:bg-gray-200 text-red-700 font-normal hover:text-red-900 rounded py-2 px-6 flex items-center justify-center">
                    <!-- github -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                    <span class="inline-block">View on Github</span>
                </a>
            </div>
        </div>

        <img src="/assets/img/lilz.png" alt="Lil' Z, Zippopotam.us mascot" class="hidden lg:block mx-auto w-1/4 mb-6 lg:mb-0 object-contain">
    </div>

    <hr class="block my-8 border border-red-400 lg:hidden">

    <div class="md:flex -mx-2 -mx-4">
        @foreach($page->features as $key => $feature)
            <div class="mb-8 mx-3 px-2 lg:w-1/3">
                <h3 class="text-2xl md:text-xl lg:text-2xl text-red-600 mb-0 flex items-center">
                    <div class="inline-block mr-2">
                        {!! $feature['icon'] !!}
                    </div>
                    {{ $feature['title'] }}
                </h3>
                <p class="self-end">{{ $feature['description'] }}</p>
            </div>
        @endforeach
    </div>
</section>
@endsection
