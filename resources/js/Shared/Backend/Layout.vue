<template>
    <div class="h-screen flex overflow-hidden bg-white">
        <TransitionRoot as="template" :show="sidebarOpen">
            <Dialog as="div" static class="fixed inset-0 flex z-40 lg:hidden" @close="sidebarOpen = false" :open="sidebarOpen">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
                    <DialogOverlay class="fixed inset-0 bg-gray-600 bg-opacity-75" />
                </TransitionChild>
                <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
                    <div class="relative flex-1 flex flex-col max-w-xs w-full bg-white focus:outline-none">
                        <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                            <div class="absolute top-0 right-0 -mr-12 pt-2">
                                <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="sidebarOpen = false">
                                    <span class="sr-only">Close sidebar</span>
                                    <XIcon class="h-6 w-6 text-gray-700" aria-hidden="true" />
                                </button>
                            </div>
                        </TransitionChild>
                        <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                            <div class="flex-shrink-0 flex items-center px-4">
                                <img class="h-8 w-auto" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="Workflow" />
                            </div>
                            <nav aria-label="Sidebar" class="mt-5">
                                <div class="px-2 space-y-1">
                                    <a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-500 hover:text-gray-900', 'group flex items-center px-2 py-2 text-base font-medium rounded-md']">
                                        <component :is="item.icon" :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-4 h-6 w-6']" aria-hidden="true" />
                                        {{ item.name }}
                                    </a>
                                </div>
                            </nav>
                        </div>
                        <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                            <a href="#" class="flex-shrink-0 group block">
                                <div class="flex items-center">
                                    <div>
                                        <img class="inline-block h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="" />
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-base text-gray-400 mt-3 text-center">&copy; 2021 <a href="#" class="font-bold">Mistri Solutions</a>, All rights reserved.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </TransitionChild>
                <div class="flex-shrink-0 w-14" aria-hidden="true">
                    <!-- Force sidebar to shrink to fit close icon -->
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-64">
                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="flex flex-col h-0 flex-1 border-r border-gray-200 bg-gray-700">
                    <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                        <div class="flex items-center flex-shrink-0 px-4">
                            <img class="h-8 w-auto mx-auto" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="Workflow" />
                        </div>
                        <nav class="sidebar_bg pt-4 mt-5 flex-1" aria-label="Sidebar">
                            <div class="px-2 space-y-6">
                                <inertia-link v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-green-800 text-gray-200 capitalize' : 'text-gray-50 hover:bg-green-800 hover:text-gray-50', 'group flex items-center px-2 py-2 text-sm font-semibold rounded-md capitalize']">
                                    <component :is="item.icon" :class="[item.current ? 'text-gray-50' : 'text-gray-200 group-hover:text-gray-50', 'mr-3 h-6 w-6']" aria-hidden="true" />
                                    {{ item.name }}
                                </inertia-link>
                            </div>
                        </nav>
                    </div>
                    <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                        <a href="#" class="flex-shrink-0 w-full group block">
                            <p class="text-base text-gray-400 mt-3 text-center">&copy; 2021 <a href="#" class="font-bold">Mistri Solutions</a>, All rights reserved.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col min-w-0 flex-1 overflow-hidden">
            <div class="lg:hidden">
                <div class="flex items-center justify-between bg-gray-50 border-b border-gray-200 px-4 py-1.5">
                    <div>
                        <img class="h-8 w-auto" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="Workflow" />
                    </div>
                    <div>
                        <button type="button" class="-mr-3 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900" @click="sidebarOpen = true">
                            <span class="sr-only">Open sidebar</span>
                            <MenuIcon class="h-6 w-6" aria-hidden="true" />
                        </button>
                    </div>
                </div>
            </div>
            <Header />
            <div class="flex-1 content_bg relative z-0 flex overflow-hidden">
                <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
                    <!-- Start main area-->
                    <div class="absolute inset-0 py-6 px-4 sm:px-6 lg:px-8">
                        <div class="h-full bg-gray-50 border-2 border-gray-100 rounded-md">
                            <slot></slot>
                        </div>
                    </div>
                    <!-- End main area -->
                </main>
                <!-- <aside class="hidden relative xl:flex xl:flex-col flex-shrink-0 w-96 ">
                    Start secondary column (hidden on smaller screens)
                    <div class="absolute inset-0 py-6 px-4 sm:px-6 lg:px-8">
                        <div class="h-full bg-gray-50 border-2 border-gray-200 border-dashed rounded-lg" />
                    </div>
                    End secondary column
                </aside> -->
            </div>
        </div>
    </div>
</template>

<script>
import {ref} from "vue"
import {Dialog, DialogOverlay, TransitionChild, TransitionRoot} from "@headlessui/vue"
import {CalendarIcon, HomeIcon, MapIcon, MenuIcon, SearchCircleIcon, SpeakerphoneIcon, UserGroupIcon, XIcon} from "@heroicons/vue/outline"
import Header from "./Partials/Header.vue"

const navigation = [
    {name: "Dashboard", href: "/dashboard", icon: HomeIcon, current: true},
    {name: "Services", href: "/services", icon: CalendarIcon, current: false},
    {name: "Images", href: "/images", icon: UserGroupIcon, current: false},
    {name: "locations", href: "#", icon: SearchCircleIcon, current: false},
    {name: "bookings", href: "#", icon: SpeakerphoneIcon, current: false},
    {name: "settings", href: "#", icon: MapIcon, current: false},
]

export default {
    components: {
        Dialog,
        DialogOverlay,
        TransitionChild,
        TransitionRoot,
        MenuIcon,
        XIcon,
        Header,
    },
    setup() {
        const sidebarOpen = ref(false)

        return {
            navigation,
            sidebarOpen,
        }
    },
}
</script>

<style scoped>
/* .sidebar_bg {
    background-image: url("./../../../public/images/dashboard.svg");
    background-repeat: no-repeat;
    background-size: 100% 100%;
    background-position: center;
    object-fit: cover;
} */
/* .content_bg{
    background-image: url("../../../../public/images/resort.jpg");
    background-repeat: no-repeat;
    background-size: 100% 100%;
    background-position: center;
    object-fit: cover;
} */
</style>
