<x-layouts.frontend :title="$blog->title . ' | منصة Medvion'">

    {{-- Article Hero Section --}}
    <section class="relative pt-32 pb-16 lg:pt-40 lg:pb-24 bg-white overflow-hidden">
        {{-- Decorative Blob --}}
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-primary/5 blur-3xl opacity-60 pointer-events-none"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center reveal">
            {{-- Back to blogs link --}}
            <a href="{{ route('blogs.index') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-gray-500 hover:text-primary transition-colors mb-8">
                <svg class="w-4 h-4 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                {{ __('land.back_to_blogs') ?? 'Back to Blog' }}
            </a>

            {{-- Metadata --}}
            <div class="flex flex-wrap items-center justify-center gap-4 text-sm text-gray-500 mb-6">
                <div class="flex items-center gap-1.5 bg-gray-50 px-3 py-1 rounded-full border border-gray-100">
                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>{{ $blog->published_at ? $blog->published_at->format('F d, Y') : '' }}</span>
                </div>
                <div class="flex items-center gap-1.5 bg-gray-50 px-3 py-1 rounded-full border border-gray-100">
                    <svg class="w-4 h-4 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <span>{{ $blog->read_count }} {{ __('land.views') ?? 'Views' }}</span>
                </div>
                @if($blog->creator)
                <div class="flex items-center gap-1.5 bg-gray-50 px-3 py-1 rounded-full border border-gray-100">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>{{ $blog->creator->name }}</span>
                </div>
                @endif
            </div>

            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-8">
                {{ $blog->title }}
            </h1>
        </div>
    </section>

    {{-- Article Image & Content --}}
    <section class="pb-24 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 reveal delay-100">
            {{-- Main Image --}}
            <div class="relative rounded-3xl overflow-hidden mb-12 shadow-lg border border-gray-100 aspect-video bg-gray-50">
                <img src="{{ asset($blog->main_image) }}" 
                     alt="{{ $blog->title }}" 
                     class="w-full h-full object-cover">
            </div>

            {{-- Short Description (Lead) --}}
            <div class="prose prose-lg prose-primary max-w-none mb-12">
                <p class="text-xl md:text-2xl text-gray-600 leading-relaxed font-light border-r-4 border-primary pr-6 rtl:border-r-4 rtl:border-l-0 rtl:pr-6 rtl:pl-0 ltr:border-l-4 ltr:border-r-0 ltr:pl-6 ltr:pr-0 bg-gray-50/50 py-4 rounded-l-xl rtl:rounded-r-xl rtl:rounded-l-none">
                    {{ $blog->short_description }}
                </p>
            </div>

            {{-- Main Content --}}
            <article class="prose prose-lg prose-gray max-w-none text-gray-700 leading-loose
                            prose-headings:text-gray-900 prose-headings:font-bold prose-headings:mb-6
                            prose-a:text-primary hover:prose-a:text-primary-dark
                            prose-img:rounded-2xl prose-img:shadow-sm">
                {{-- If content is HTML --}}
                {!! nl2br(e($blog->content)) !!}
            </article>

            {{-- Share & Tags area (Optional future enhancement) --}}
            <div class="mt-16 pt-8 border-t border-gray-100 flex items-center justify-between">
                <div class="text-gray-500 font-semibold text-sm">
                    {{ __('land.share_article') ?? 'Share this article' }}
                </div>
                <div class="flex gap-2">
                    {{-- Twitter --}}
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-[#1DA1F2] hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                    {{-- Facebook --}}
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-[#1877F2] hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    {{-- LinkedIn --}}
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($blog->title) }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-[#0A66C2] hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-layouts.frontend>
