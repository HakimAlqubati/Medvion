<section id="blog" class="py-20 md:py-32 {{ $altBg ? 'bg-gray-50' : 'bg-white' }} relative overflow-hidden">
    {{-- Lightweight Decorative --}}
    <div class="absolute inset-0 z-0 opacity-30 pointer-events-none">
        <svg class="absolute top-0 right-0 w-96 h-96 text-primary/5 transform translate-x-1/3 -translate-y-1/3" fill="currentColor" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="40" />
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        {{-- Section Header --}}
        <div class="text-center max-w-3xl mx-auto mb-16 reveal">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-primary/10 border border-primary/20 text-primary mb-4 shadow-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                <span class="text-xs sm:text-sm font-bold tracking-widest uppercase">{{ __('land.blog_section_badge') ?? 'Blog' }}</span>
            </div>
            <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-[1.2] mb-6">
                {{ __('land.blog_section_title') ?? 'Medvion Blog' }}
            </h2>
            <p class="text-lg md:text-xl text-gray-500 leading-relaxed">
                {{ __('land.blog_section_subtitle') ?? 'Stay updated with the latest articles and medical insights.' }}
            </p>
        </div>

        {{-- Blog Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            @forelse($blogs as $blog)
            <div class="group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col h-full overflow-hidden reveal delay-{{ ($loop->iteration % 4 == 0 ? 4 : $loop->iteration % 4) * 100 }}">

                {{-- Image --}}
                <div class="relative h-48 overflow-hidden bg-gray-50 shrink-0">
                    <img src="{{ $blog->main_image ? asset('storage/' . $blog->main_image) : asset('assets/images/placeholder.webp') }}"
                        alt="{{ $blog->title['ar'] }}"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        loading="lazy">
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-lg text-xs font-bold text-primary shadow-sm">
                        {{ $blog->published_at ? $blog->published_at->format('M d, Y') : '' }}
                    </div>
                </div>

                {{-- Content --}}
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-lg font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-primary transition-colors">
                        {{ $blog->title['ar'] }}
                    </h3>
                    <p class="text-sm text-gray-500 mb-6 line-clamp-3 leading-relaxed flex-grow">
                        {{ $blog->short_description['ar'] }}
                    </p>

                    {{-- Footer & Action --}}
                    <div class="mt-auto pt-4 border-t border-gray-50 flex items-center justify-between">
                        <div class="flex items-center text-gray-400 text-xs gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <span>{{ $blog->read_count }} {{ __('land.views') ?? 'Views' }}</span>
                        </div>
                        <a href="{{ route('blogs.show', $blog->slug) }}" class="inline-flex items-center gap-1 text-sm font-bold text-primary hover:text-primary-dark transition-colors">
                            {{ __('land.read_more') ?? 'Read More' }}
                            <svg class="w-4 h-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-gray-500 py-12">
                {{ __('land.no_blogs') ?? 'No blogs available currently.' }}
            </div>
            @endforelse
        </div>

        {{-- Browse All Button --}}
        @if($blogs->count() > 0)
        <div class="text-center reveal">
            <a href="{{ route('blogs.index') }}" class="group inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-white text-primary border border-primary/20 font-bold rounded-xl hover:bg-primary/5 hover:-translate-y-0.5 transition-all duration-300 shadow-sm">
                {{ __('land.browse_blogs') ?? 'Browse Medvion Blog' }}
                <svg class="w-5 h-5 rtl:rotate-180 transition-transform group-hover:translate-x-1 rtl:group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
        @endif
    </div>
</section>