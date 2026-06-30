<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <header class="bg-[#2F4B61] text-white top-0 z-10">
        <section class="p-4 flex justify-between items-center">
            <h1 class="text-3xl font-medium">
                <Link :href="route('home')">🔔 HearYe</Link>
            </h1>

            <nav class="flex items-center gap-4">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('logout')"
                    method="post"
                    as="button"
                >
                    Log Out
                </Link>
            </nav>
        </section>
    </header>
</template>
