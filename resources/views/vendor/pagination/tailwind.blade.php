@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}"
    class="tw-flex tw-flex-col tw-items-center tw-justify-center sm:tw-flex">
    {{-- Números das páginas --}}
    <div class="tw-flex tw-items-center tw-space-x-2 tw-mb-4">
        {{-- Página Anterior --}}
        @foreach ($elements as $element)
        @if (is_string($element))
        <span
            class="tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-500 tw-bg-white tw-border tw-border-gray-300 tw-cursor-default tw-rounded-md dark:tw-bg-gray-800 dark:tw-border-gray-600">
            {{ $element }}
        </span>
        @endif
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <span
            class="tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-500 tw-bg-white tw-border tw-border-gray-300 tw-cursor-default tw-rounded-md dark:tw-bg-gray-800 dark:tw-border-gray-600">
            {{ $page }}
        </span>
        @else
        <a href="{{ $url }}"
            class="tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-700 tw-bg-white tw-border tw-border-gray-300 tw-rounded-md hover:tw-bg-gray-100 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-blue-300 dark:tw-bg-gray-800 dark:tw-border-gray-600 dark:tw-hover:bg-gray-700">
            {{ $page }}
        </a>
        @endif
        @endforeach
        @endif
        @endforeach
    </div>

    {{-- Botões de Controle --}}
    <div class="tw-flex tw-space-x-2">
        {{-- Botão Previous --}}
        @if ($paginator->onFirstPage())
        <span
            class="tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-500 tw-bg-white tw-border tw-border-gray-300 tw-cursor-default tw-rounded-md dark:tw-bg-gray-800 dark:tw-border-gray-600">
            {!! __('pagination.previous') !!}
        </span>
        @else
        <a href="{{ $paginator->previousPageUrl() }}"
            class="tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-700 tw-bg-white tw-border tw-border-gray-300 tw-rounded-md hover:tw-bg-gray-100 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-blue-300 dark:tw-bg-gray-800 dark:tw-border-gray-600 dark:hover:tw-bg-gray-700">
            {!! __('pagination.previous') !!}
        </a>
        @endif

        {{-- Botão Next --}}
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"
            class="tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-700 tw-bg-white tw-border tw-border-gray-300 tw-rounded-md hover:tw-bg-gray-100 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-blue-300 dark:tw-bg-gray-800 dark:tw-border-gray-600 dark:hover:tw-bg-gray-700">
            {!! __('pagination.next') !!}
        </a>
        @else
        <span
            class="tw-px-4 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-500 tw-bg-white tw-border tw-border-gray-300 tw-cursor-default tw-rounded-md dark:tw-bg-gray-800 dark:tw-border-gray-600">
            {!! __('pagination.next') !!}
        </span>
        @endif
    </div>
</nav>
@endif