<template>
    <Head title="Users"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-zinc-400 leading-tight">
                Users - {{ users.data.length }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-600 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    ID
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Name
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Email
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="user in users.data" :key="user.id" class="bg-white border-b dark:border-gray-300">
                                <td class="py-4 px-6">
                                    <Link :href="route('users.show', user.id)" as="button" class="font-medium text-blue-500 hover:text-blue-700 mr-2">
                                        {{ user.id }}
                                    </Link>
                                </td>
                                <td class="py-4 px-6">
                                    {{ user.name }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ user.email }}
                                </td>
                                <td class="py-4 px-6">
                                    <Link :href="route('users.edit', user.id)" as="button" class="font-medium text-blue-500 hover:text-blue-700 mr-2">
<!--                                        <i class='far fa-edit'></i>--> Edit
                                    </Link>
                                    <Link :href="route('users.destroy', user.id)" method="delete" as="button" class="font-medium text-red-500 hover:text-red-700 mr-2">
<!--                                        <i class='far fa-trash-alt'></i>--> Delete
                                    </Link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Link} from "@inertiajs/vue3";

defineProps({
    users: Object,
})
</script>
