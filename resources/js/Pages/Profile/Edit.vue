<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import { Sparkles } from '@lucide/vue';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Pengaturan Profil — RÜYA" />

    <AdminLayout>
        <div class="space-y-8 max-w-4xl">
            <!-- Header -->
            <div>
                <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-brand-leaf mb-1">
                    <Sparkles class="w-4 h-4 text-brand-gold" />
                    <span>Administrator Profile Settings</span>
                </div>
                <h2 class="text-3xl font-serif font-bold tracking-tight text-brand-dark">Profil Pengguna</h2>
                <p class="text-sm text-brand-leaf/80 mt-1">Kelola data profil, email, dan kata sandi akun manajemen RÜYA Anda.</p>
            </div>

            <div class="space-y-6">
                <!-- Update Profile Info Card -->
                <div class="bg-white border border-brand-sand/80 rounded-3xl p-6 sm:p-8 shadow-fashion">
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                        class="max-w-xl"
                    />
                </div>

                <!-- Update Password Card -->
                <div class="bg-white border border-brand-sand/80 rounded-3xl p-6 sm:p-8 shadow-fashion">
                    <UpdatePasswordForm class="max-w-xl" />
                </div>

                <!-- Delete User Card -->
                <div class="bg-white border border-brand-sand/80 rounded-3xl p-6 sm:p-8 shadow-fashion">
                    <DeleteUserForm class="max-w-xl" />
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
