<script setup>
import { Head } from '@inertiajs/vue3';
import NavBar from '@/Components/NavBar.vue';
import Announcement from '@/Components/Announcement.vue';
import Pagination from '@/Components/Pagination.vue';

defineProps({
    announcements: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head title="Announcements" />

    <div class="min-h-screen bg-gray-100 text-black">
        <NavBar />

        <main class="mx-auto max-w-6xl px-6 py-8">
            <div class="mb-6 flex items-center justify-between">
                <h1 class="text-4xl font-semibold text-black">Announcements</h1>
            </div>

            <ul>
                <li v-for="announcement in announcements.data" :key="announcement.id">
                    <Announcement :announcement="announcement" />
                </li>
            </ul>

            <Pagination :links="announcements.links" />
        </main>
    </div>
</template>
