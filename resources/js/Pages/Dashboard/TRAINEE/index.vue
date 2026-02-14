<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    user: Object,
    stats: Object,
});
</script>

<template>

    <Head title="Trainee Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Trainee Dashboard: Welcome, {{ user.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-indigo-700 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 text-white">
                        <h3 class="text-lg font-bold">Hello, Trainee!</h3>
                        <p>You are currently assigned to the <span class="font-bold underline">{{ user.role }}</span>
                            department.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-blue-500">
                        <div class="text-sm text-gray-500 uppercase font-bold">Training Progress</div>
                        <div class="text-2xl font-bold">{{ stats.progress }}%</div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-green-500">
                        <div class="text-sm text-gray-500 uppercase font-bold">Assigned Modules</div>
                        <div class="text-2xl font-bold">{{ stats.assigned_modules }}</div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-yellow-500">
                        <div class="text-sm text-gray-500 uppercase font-bold">Days Remaining</div>
                        <div class="text-2xl font-bold">{{ stats.days_remaining }} Days</div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h4 class="font-bold text-lg mb-4">Your Onboarding Checklist</h4>
                        <ul class="space-y-3">
                            <li class="flex items-center space-x-3">
                                <input type="checkbox" checked disabled class="rounded text-indigo-600">
                                <span class="text-gray-600 line-through">Account activation</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <input type="checkbox" class="rounded text-indigo-600">
                                <span class="text-gray-700">Complete Departmental Orientation</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <input type="checkbox" class="rounded text-indigo-600">
                                <span class="text-gray-700">Review Compliance Policies</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>