<template>
    <app-layout>
        <form @submit.prevent="submit()" class="max-w-screen-md mx-auto">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Personal Information</h3>
                        <p class="mt-1 text-sm text-gray-500">Use a permanent address where you can recieve mail.</p>
                    </div>

                    <div>
                        <h1></h1>
                    </div>

                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                            <input v-model="form.firstName" type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                            <input v-model="form.lastName" type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                            <input v-model="form.email" type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="country" class="block text-sm font-medium text-gray-700">Country / Region</label>
                            <select v-model="form.country" id="country" name="country" autocomplete="country" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="US">United States</option>
                                <option value="CDA">Canada</option>
                                <option value="MEX">Mexico</option>
                            </select>
                        </div>

                        <div class="col-span-6">
                            <label for="street-address" class="block text-sm font-medium text-gray-700">Street address</label>
                            <input v-model="form.street" type="text" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input v-model="form.city" type="text" name="city" id="city" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <label for="state" class="block text-sm font-medium text-gray-700">State / Province</label>
                            <input v-model="form.province" type="text" name="state" id="state" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                            <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP / Postal</label>
                            <input v-model="form.postal" type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
                </div>
            </div>
        </form>
    </app-layout>
</template>

<script>
import AppLayout from "../../Shared/Backend/Layout.vue"
import {useForm} from "@inertiajs/inertia-vue3"

export default {
    components: {
        AppLayout,
    },
    props: {
        service: Object,
    },

    setup(props) {
        // let service = props.service;
        // console.log(props)
        const form = useForm({
            _method:'PUT',
            firstName: props.service.firstName,
            lastName: props.service.lastName,
            email: props.service.email,
            country: [],
            street: props.service.street,
            city: props.service.city,
            province: props.service.province,
            postal: props.service.postal,
        })
        function submit() {
            // console.log(form)
            form.post(route('service.update', props.service.id));
        }
        return {
            form,
            submit,
          
        }
    },
}
</script>
