<template>
    <app-layout>
        <div class="mt-5 p-4 sm:mt-0 sm:flex-shrink-0">
            <inertia-link href="/service/create" class="inline-flex items-end px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-green-700 hover:bg-brandColor focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brandColor sm:text-sm"><PlusIcon class="h-4 w-4 mr-2" aria-hidden="true" /> Create</inertia-link>
        </div>
        <div class="flex flex-col p-4">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-green-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-50 uppercase tracking-wider">First Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-50 uppercase tracking-wider">Last Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-50 uppercase tracking-wider">email</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-50 uppercase tracking-wider">Country</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-50 uppercase tracking-wider">Street</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-50 uppercase tracking-wider">City</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-50 uppercase tracking-wider">Province</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-50 uppercase tracking-wider">Postal</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="person in services" :key="person.email">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" :src="person.image" alt="" />
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ person.firstName }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ person.lastName }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ person.email }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ person.country }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ person.street }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ person.city }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ person.province }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ person.postal }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                            <Menu as="div" class="relative inline-block text-left">
                                                <div>
                                                    <MenuButton class="bg-gray-100 rounded-full flex items-center text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500">
                                                        <span class="sr-only">Open options</span>
                                                        <DotsVerticalIcon class="h-5 w-5" aria-hidden="true" />
                                                    </MenuButton>
                                                </div>

                                                <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                                    <MenuItems class="origin-top-right z-10 absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                        <div class="py-1">
                                                            <MenuItem v-slot="{active}">
                                                                <inertia-link @click="edit(person.id)" href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Edit</inertia-link>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{active}">
                                                                <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Update</a>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{active}">
                                                                <a href="#" @click="deleteService(person.id)" :class="[active ? 'bg-gray-100 text-red-700' : 'text-red-700', 'block px-4 py-2 text-sm']">Delete</a>
                                                            </MenuItem>
                                                        </div>
                                                    </MenuItems>
                                                </transition>
                                            </Menu>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import {ref} from "@vue/reactivity"
import AppLayout from "../../Shared/Backend/Layout.vue"
import {PlusIcon} from "@heroicons/vue/outline"
import {Menu, MenuButton, MenuItem, MenuItems} from "@headlessui/vue"
import {DotsVerticalIcon} from "@heroicons/vue/solid"
import {Inertia} from "@inertiajs/inertia"
const people = ref([
    {
        name: "Jane Cooper",
        title: "Regional Paradigm Technician",
        department: "Optimization",
        role: "Admin",
        email: "jane.cooper@example.com",
        image: "https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60",
    },
    {
        name: "Jane Cooper",
        title: "Regional Paradigm Technician",
        department: "Optimization",
        role: "Admin",
        email: "jane.cooper@example.com",
        image: "https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60",
    },
    {
        name: "Jane Cooper",
        title: "Regional Paradigm Technician",
        department: "Optimization",
        role: "Admin",
        email: "jane.cooper@example.com",
        image: "https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60",
    },
    {
        name: "Jane Cooper",
        title: "Regional Paradigm Technician",
        department: "Optimization",
        role: "Admin",
        email: "jane.cooper@example.com",
        image: "https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60",
    },
    {
        name: "Jane Cooper",
        title: "Regional Paradigm Technician",
        department: "Optimization",
        role: "Admin",
        email: "jane.cooper@example.com",
        image: "https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60",
    },
])

export default {
    components: {
        AppLayout,
        PlusIcon,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        DotsVerticalIcon,
    },
    props: {
        services: Array,
    },
    setup() {
        // console.log(services)
        function edit(id) {
            Inertia.get(route("service.edit", id))
        }
        function deleteService(id) {
            Inertia.delete(route("service.delete", id))
            // console.log(id)
        }

        return {
            people,
            edit,
            deleteService,
        }
    },
}
</script>
