<script setup>
/**
 * Announcement.vue
 * This houses each announcement row using tailwind css for styling
 */

import { computed } from 'vue';
import { marked } from 'marked';

const props = defineProps({
    announcement: {
        type: Object,
        required: true,
    },
});

// Using marked to parse the Markdown from the announcement body
const parsedBody = computed(() => marked(props.announcement.body));
</script>

<template>
    <div class="p-6 mx-auto flex space-x-2 max-w-6xl shadow-md bg-white mt-2">        🔔
        <div class="flex-1">
            <div class="flex justify-between items-center">
                <div>
                    <!-- The name of the author -->
                    <span class="text-gray-800">{{ announcement.user.name }}</span>
                    <!-- The date the announcement was made -->
                    <small class="ml-2 text-sm text-gray-600">{{ new Date(announcement.created_at).toLocaleString() }}</small>
                </div>
            </div>
            <!-- Once the markdown has been parsed I then use v-html to parse the html -->
            <div v-html="parsedBody"></div>
        </div>
    </div>
</template>

<style scoped>

</style>
