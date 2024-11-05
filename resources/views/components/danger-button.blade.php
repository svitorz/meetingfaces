<button {{ $attributes->merge(['type' => 'submit', 'class' => 'tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-bg-red-600 tw-border tw-border-transparent tw-rounded-md tw-font-semibold tw-text-xs tw-text-white tw-uppercase tw-tracking-widest tw-hover:bg-red-500 tw-active:bg-red-700 tw-focus:outline-none tw-focus:ring-2 tw-focus:ring-red-500 tw-focus:ring-offset-2 tw-transition tw-ease-in-out tw-duration-150']) }}>
    {{ $slot }}
</button>
