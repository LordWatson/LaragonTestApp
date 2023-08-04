<template>
    <Head title="Users"/>
    <form @submit.prevent="submit">
        <AuthenticatedLayout>
                <template #header>
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-11">
                            <h2 class="font-semibold text-xl text-zinc-400 leading-tight">
                                Edit User - {{ user.data.id }}
                            </h2>
                        </div>
                        <div>
                            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Update
                            </PrimaryButton>
                        </div>
                    </div>
                </template>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="overflow-x-auto relative">
                                <table class="w-full text-sm text-left text-gray-500">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-600 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Name
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Email
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-b dark:border-gray-300">
                                            <td class="py-4 px-6">
                                                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus />
                                                <InputError class="mt-2" :message="$page.props.errors.name" />
                                            </td>
                                            <td class="py-4 px-6">
                                                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
                                                <InputError class="mt-2" :message="$page.props.errors.email" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </AuthenticatedLayout>
    </form>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {useForm} from "@inertiajs/vue3";
import { router } from '@inertiajs/vue3'
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    user: Object,
})

const form = useForm({
    name: props.user.data?.name,
    email: props.user.data?.email,
});

function submit() {
    router.put(route('users.update', props.user.data.id), form)
}
</script>
