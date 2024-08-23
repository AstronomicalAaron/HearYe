<script setup>
import { Head } from '@inertiajs/vue3';
import NavBar from "@/Components/NavBar.vue";
import Login from "@/Pages/Auth/Login.vue";
import Announcement from "@/Components/Announcement.vue";
import Pagination from "@/Components/Pagination.vue";

defineProps({
    // Pull in the announcements from the routes as well as the pagination data
    announcements: {
        type: Object
    },
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="HearYe" />
    <div class="text-black/50 dark:text-white/50">
        <div class="relative flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="bg-gray-100 relative w-full max-w-2xl lg:max-w-7xl">
                <!-- Add in the navigation bar/header -->
                <header>
                    <NavBar />
                </header>

                <main class="max-w-6xl mx-auto mt-6 min-h-screen bg-gray-100 text-black">
                    <!-- Here we're checking if the user is logged in, if so they can view the board -->
                    <div v-if="$page.props.auth.user">
                        <h1 class="text-4xl text-black">Announcements</h1>
                        <ul>
                            <!-- Looping through the data from the query created in routes/web.php  -->
                            <li v-for="announcement in announcements.data" :key="announcement.id">
                                <!-- Creating an announcement component for each announcement -->
                                <!-- Passed in  announcement is a JSON object -->
                                <Announcement :announcement="announcement" />
                            </li>
                        </ul>
                        <!-- Creating a pagination component from the pagination data created in routes/web.php -->
                        <Pagination :links="announcements.links" />
                    </div>
                    <Login v-else />
                </main>

                <footer class="bg-[#2F4B61] py-16 text-white">

                </footer>
            </div>
        </div>
    </div>
</template>
