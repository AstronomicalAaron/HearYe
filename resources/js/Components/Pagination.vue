<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    links: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <!-- used nav here because it allows users to move between different pages of content so it's a form of navigation -->
    <nav aria-label="Page navigation" class="flex justify-center mt-4">
        <ul class="inline-flex items-center space-x-1">
            <li v-for="link in links" :key="link.url" :class="{ 'pointer-events-none opacity-50': !link.url, 'font-bold text-blue-500': link.active }">
                <!-- url and label are what we get from the backend using the ->paginate() method from the model -->
                <a
                    :href="link.url"
                    v-html="link.label"
                    class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-blue-100 hover:text-blue-700"
                    :class="{'bg-blue-500 text-white': link.active}"
                ></a>
            </li>
        </ul>
    </nav>
</template>
