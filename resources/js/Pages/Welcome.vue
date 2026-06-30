<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import NavBar from '@/Components/NavBar.vue';
import Login from '@/Pages/Auth/Login.vue';
import Register from '@/Pages/Auth/Register.vue';

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    canResetPassword: Boolean,
    status: String,
});

const authMode = ref(props.canLogin ? 'login' : 'register');
</script>

<template>
    <Head title="HearYe" />

    <div class="relative flex min-h-screen flex-col bg-gradient-to-br from-slate-50 via-white to-slate-100 text-slate-900">
        <NavBar />

        <main class="flex flex-1 items-center justify-center px-6 py-16">
            <section class="mx-auto grid w-full max-w-6xl items-center gap-10 lg:grid-cols-[1fr_28rem]">
                <div class="text-center lg:text-left">
                    <div class="mb-6 text-6xl">🔔</div>

                    <p class="mb-4 inline-flex rounded-full bg-yellow-100 px-4 py-2 text-sm font-semibold text-yellow-800">
                        Team announcements in one place
                    </p>

                    <h1 class="text-5xl font-bold tracking-tight text-slate-950 md:text-6xl">
                        Keep important announcements simple, visible, and organized.
                    </h1>

                    <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-600 lg:mx-0 mx-auto">
                        Share updates, review recent announcements, and stay informed without digging through scattered messages.
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-8 text-left shadow-xl">
                    <div class="mb-6 grid grid-cols-2 rounded-lg bg-slate-100 p-1 text-sm font-semibold">
                        <button
                            type="button"
                            class="rounded-md px-4 py-2"
                            :class="authMode === 'login' ? 'bg-white text-slate-950 shadow-sm' : 'text-slate-600 hover:text-slate-950'"
                            @click="authMode = 'login'"
                        >
                            Log In
                        </button>
                        <button
                            type="button"
                            class="rounded-md px-4 py-2"
                            :class="authMode === 'register' ? 'bg-white text-slate-950 shadow-sm' : 'text-slate-600 hover:text-slate-950'"
                            @click="authMode = 'register'"
                        >
                            Register
                        </button>
                    </div>

                    <Login
                        v-if="authMode === 'login'"
                        :can-reset-password="canResetPassword"
                        :can-register="canRegister"
                        :status="status"
                        @show-register="authMode = 'register'"
                    />
                    <Register
                        v-else
                        @show-login="authMode = 'login'"
                    />
                </div>
            </section>
        </main>

        <footer class="border-t border-slate-200 py-8 text-center text-sm text-slate-500">
            © {{ new Date().getFullYear() }} Aaron Barczewski. All rights reserved.
            <span class="mx-3 text-slate-300">|</span>
            <a href="#" class="hover:text-slate-700">Privacy Policy</a>
            <span class="mx-3 text-slate-300">|</span>
            <a href="#" class="hover:text-slate-700">Terms of Service</a>
        </footer>
    </div>
</template>
