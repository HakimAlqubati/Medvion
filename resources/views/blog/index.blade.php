<x-layouts.frontend :title="(__('land.blog_section_title') ?? 'Medvion Blog') . ' | منصة Medvion'">

    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-primary-dark via-primary to-primary-light text-white pt-44 pb-20 lg:pt-52 lg:pb-28">
        <div class="absolute inset-0 opacity-10"
             style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
            <h1 class="text-4xl sm:text-5xl font-extrabold mb-4">{{ __('land.blog_section_title') ?? 'Medvion Blog' }}</h1>
            <p class="text-white/80 text-lg max-w-2xl mx-auto">{{ __('land.blog_section_subtitle') ?? 'Stay updated with the latest articles and medical insights.' }}</p>
        </div>
    </section>

    {{-- Blog Grid --}}
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($blogs as $blog)
                    <div class="group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col h-full overflow-hidden reveal delay-{{ ($loop->iteration % 3 == 0 ? 3 : $loop->iteration % 3) * 100 }}">
                        
                        {{-- Image --}}
                        <a href="{{ route('blogs.show', $blog->slug) }}" class="block relative h-56 overflow-hidden bg-gray-50 shrink-0">
                            <img src="{{ asset($blog->main_image) }}" 
                                 alt="{{ $blog->title }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                 loading="lazy">
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-lg text-xs font-bold text-primary shadow-sm">
                                {{ $blog->published_at ? $blog->published_at->format('M d, Y') : '' }}
                            </div>
                        </a>

                        {{-- Content --}}
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-primary transition-colors">
                                <a href="{{ route('blogs.show', $blog->slug) }}">
                                    {{ $blog->title }}
                                </a>
                            </h3>
                            <p class="text-gray-500 mb-6 line-clamp-3 leading-relaxed flex-grow">
                                {{ $blog->short_description }}
                            </p>

                            {{-- Footer --}}
                            <div class="mt-auto pt-4 border-t border-gray-50 flex items-center justify-between">
                                <div class="flex items-center text-gray-400 text-sm gap-1.5">
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
                    <div class="col-span-full text-center text-gray-500 py-20 bg-white rounded-2xl border border-gray-100">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 7H20" />
                        </svg>
                        <p class="text-xl">{{ __('land.no_blogs') ?? 'No blogs available currently.' }}</p>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-12 flex justify-center">
                {{ $blogs->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </section>

</x-layouts.frontend>
