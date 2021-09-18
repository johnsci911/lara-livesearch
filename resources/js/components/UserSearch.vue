<template>
    <div class="flex flex-col justify-between w-full h-full overflow-auto bg-gray-200">
        <div class="top-bar flex bg-white justify-between">
            <div class="flex">
                <button class="w-22 bg-gray-200 ml-5 my-6 px-4 text-blue font-bold rounded-xl">Pages</button>
            </div>
            <div class="flex mr-2">
                <button class="my-4 px-4 py-3 text-blue">
                    <svg class="w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
                <button class="my-4 px-4 py-3 text-blue">
                    <svg class="w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg>
                </button>
                <button class="my-4 px-4 py-3 text-blue">
                    <svg class="w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                    </svg>
                </button>
                <div class="flex my-4 px-2 py-3 items-center">
                    <p class="text-gray-500">Hi, <span class="text-gray-800 font-bold">Admin</span></p>
                    <div class="profile-initial ml-2 rounded-lg bg-green">
                        <p class="px-4 py-2 text-lg text-white">A</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-bar flex bg-white justify-between border-t shadow-lg">
            <div class="flex">
                <div class="px-5 py-4 border-r">
                    <p class="py-3 text-gray-600 text-base font-bold">Contacts</p>
                </div>
                <div class="w-96 px-4 py-4 relative">
                    <div class="absolute top-0 flex items-center h-full mr-2 right-4">
                        <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input v-model="search" type="search" placeholder="Search" class="w-full rounded-xl bg-gray-200 border-none px-4 py-3 placeholder-gray-900">
                </div>
            </div>
            <div>
                <button class="bg-gray-200 mr-4 my-4 px-4 py-3 text-blue font-bold rounded-lg">Add Contact</button>
            </div>
        </div>
        <div class="h-full overflow-auto mx-6 my-6">
            <div class="bg-white rounded-lg shadow-lg px-6">
                <user-results :results="this.results"></user-results>
            </div>
        </div>
    </div>
</template>

<script>

import UserResults from "./UserResults.vue"

export default {
    components: {
        'user-results': UserResults
    },
    data() {
        return {
            search: '',
            results: {},
        }
    },
    methods: {
        fetch() {
            axios.get('/api/user', {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                params: {
                    'search': this.search,
                }
            }).then(response => {
                this.results = response.data.data
            })
        }
    },
    computed: {
        query() {
            this.fetch()
            return this.search
        }
    },
    mounted() {
        this.fetch()
    }
}
</script>
