<template>
    <app-layout>
        <form @submit.prevent="submit()" class="space-y-6 max-w-screen-sm mt-8 mx-auto" action="#" method="POST">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700"> Title </label>
                <div class="mt-1">
                    <input v-model="form.title" id="title" name="title" type="title" autocomplete="title" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                </div>
            </div>

            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700"> Amount </label>
                <div class="mt-1">
                    <input v-model="form.amount" id="amount" name="amount" type="amount" autocomplete="current-amount" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                </div>
            </div>
             <div>
                <label for="amount" class="block text-sm font-medium text-gray-700"> Image </label>
                <div class="mt-1">
                    <input type="file" @input="form.image = $event.target.files[0]" />
                </div>
            </div>

            <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add</button>
            </div>
        </form>
    </app-layout>
</template>

<script>
import {ref} from "@vue/reactivity"
import AppLayout from "../../Shared/Backend/Layout.vue"
import {Inertia, Method} from "@inertiajs/inertia"
import {useForm} from "@inertiajs/inertia-vue3"

export default {
    components: {
        AppLayout,
    },
    props: {},
    setup() {
        const form = useForm({
            title: null,
            amount: null,
            image:null,
        })
        function submit() {
            // console.log(form)
            form.post("/image/store")
        }
        return {
            form,
            submit,
        }
    },
}
</script>
