<div id="toast"
     class="fixed top-5 right-5 px-5 py-3 flex items-center gap-3 rounded-lg shadow-lg text-white hidden"
     x-data="{ show: false, message: '', type: 'success' }"
     x-show="show"
     x-transition:enter="transform ease-out duration-300 transition"
     x-transition:enter-start="translate-y-5 opacity-0"
     x-transition:enter-end="translate-y-0 opacity-100"
     x-transition:leave="transform ease-in duration-300 transition"
     x-transition:leave-start="translate-y-0 opacity-100"
     x-transition:leave-end="translate-y-5 opacity-0"
     :class="{ 'bg-green-500': type === 'success', 'bg-red-500': type === 'error' }"
>
    <template x-if="type === 'success'">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
        </svg>
    </template>
    <template x-if="type === 'error'">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </template>
    <span x-text="message"></span>
</div>
