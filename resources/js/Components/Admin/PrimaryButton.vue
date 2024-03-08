

<template>
    <button
        class="btn inline-flex items-center px-4 py-2 bg-teal-500 border border-transparent font-semibold text-md text-white hover:bg-teal-600 focus:bg-teal-600 active:bg-teal-800 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:ring-offset-2 transition ease-in-out duration-150"
    >
        <span class="hidden xs:block ml-2">
            <slot name="icon">
                <!-- По умолчанию ваш SVG будет тут -->
                <i class="far fa-save"></i>
            </slot>
        </span>
        <span class="hidden xs:block ml-2">
            <slot />
        </span>
    </button>
</template>
