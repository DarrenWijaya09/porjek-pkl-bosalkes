@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-[#53c076] to-[#14afaa] border border-gray-300 cursor-not-allowed leading-5 rounded-md">
                {{ __('Previous') }}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-[#53c076] to-[#14afaa] border border-gray-300 hover:bg-gradient-to-r hover:from-[#53c076] hover:to-[#14afaa] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-md">
                {{ __('Previous') }}
            </a>
        @endif

        <!-- Pagination Elements -->
        <div class="hidden md:flex">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-[#53c076] to-[#14afaa] border border-gray-300 cursor-not-allowed leading-5 rounded-md">
                        {{ $element }}
                    </span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page" class="z-10 inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-[#53c076] to-[#14afaa] border border-gray-500 cursor-pointer leading-5 rounded-md">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-[#53c076] to-[#14afaa] border border-gray-300 hover:bg-gradient-to-r hover:from-[#53c076] hover:to-[#14afaa] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-md">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-[#53c076] to-[#14afaa] border border-gray-300 hover:bg-gradient-to-r hover:from-[#53c076] hover:to-[#14afaa] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-md">
                {{ __('Next') }}
            </a>
        @else
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-[#53c076] to-[#14afaa] border border-gray-300 cursor-not-allowed leading-5 rounded-md">
                {{ __('Next') }}
            </span>
        @endif
    </nav>
@endif
