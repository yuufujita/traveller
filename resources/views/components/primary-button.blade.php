<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-fuchsia-400 dark:bg-fuchsia-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-fuchsia-800 uppercase tracking-widest hover:bg-fuchsia-700 dark:hover:bg-white focus:bg-fuchsia-700 dark:focus:bg-white active:bg-fuchsia-900 dark:active:bg-fuchsia-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
