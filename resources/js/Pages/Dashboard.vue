<template>
    <app-layout>
        <div class="mt-5 p-4 sm:mt-0 sm:flex-shrink-0 ">
            <a href="#" class="inline-flex items-end px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-green-700 hover:bg-brandColor focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brandColor sm:text-sm"><PlusIcon class="h-4 w-4 mr-2" aria-hidden="true" /> Create</a>
        </div>

        <div class="flex flex-col p-4">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-green-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-50 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-50 uppercase tracking-wider">Title</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-50 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-50 uppercase tracking-wider">Role</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="person in people" :key="person.email">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" :src="person.image" alt="" />
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ person.name }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ person.email }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ person.title }}</div>
                                        <div class="text-sm text-gray-500">{{ person.department }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Active </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ person.role }}
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
                                                                <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Edit</a>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{active}">
                                                                <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Update</a>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{active}">
                                                                <a href="#" @click="modalvalue = true" :class="[active ? 'bg-gray-100 text-red-700' : 'text-red-700', 'block px-4 py-2 text-sm']">Delete</a>
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
import AppLayout from "../Shared/Backend/Layout.vue"
import {PlusIcon} from "@heroicons/vue/outline"
import {Menu, MenuButton, MenuItem, MenuItems} from "@headlessui/vue"
import {DotsVerticalIcon} from "@heroicons/vue/solid"
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
    setup() {
        return {
            people,
        }
    },
}
</script>
