<script setup>
import {Link} from "@inertiajs/vue3";

</script>
<template>
    <header class="bg-[#2F4B61] text-white top-0 z-10">
        <section class="p-4 flex justify-between items-center">
            <h1 class="text-3xl font-medium">
                <!-- did this for no other reason than to clear the pagination params in the URI -->
                <a href="/">🔔 HearYe</a>
            </h1>
            <!-- have to add method="post" because logout is a post request -->
            <Link v-if="$page.props.auth.user" :href="route('logout')" method="post" as="button">Log Out</Link>
        </section>
    </header>
</template>
