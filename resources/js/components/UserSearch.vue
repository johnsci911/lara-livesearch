<template>
    <div class="w-full flex flex-col justify-between h-full md:overflow-auto bg-gray-200">
        <div class="top-bar flex flex-col md:flex-row md:justify-content-between bg-white justify-between">
            <div class="flex">
                <button class="w-full md:w-22 bg-gray-200 mx-4 my-2 px-4 py-3 text-blue font-bold rounded-xl">Pages</button>
            </div>
            <div class="flex justify-between md:justify-content-between mr-2">
				<div class="flex px-2 py-3">
					<button class="px-4 py-3 text-blue">
						<svg class="w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
						</svg>
					</button>
					<button class="px-4 py-3 text-blue">
						<svg class="w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
						</svg>
					</button>
					<button class="px-4 py-3 text-blue">
						<svg class="w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
						</svg>
					</button>
				</div>
                <div class="flex px-2 py-3 items-center">
                    <p class="text-gray-500">Hi, <span class="text-gray-800 font-bold">Admin</span></p>
                    <div class="profile-initial ml-2 rounded-lg bg-green">
                        <p class="px-4 py-2 text-lg text-white">A</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-bar flex flex-col md:flex-row md:justify-between bg-white border-t shadow-lg">
            <div class="flex">
                <div class="px-4 py-5 border-r">
                    <p class="text-gray-600 text-base font-bold">Contacts</p>
                </div>
                <div class="w-full md:w-96 px-4 py-2 relative">
                    <div class="absolute align-middle py-4 items-center h-full mr-2 right-4">
                        <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input v-model="search" type="search" placeholder="Search" class="w-full rounded-xl bg-gray-200 border-none px-4 py-3 placeholder-gray-900">
                </div>
            </div>
                <button class="bg-gray-200 mx-4 my-2 px-4 py-3 text-blue font-bold rounded-lg">Add Contact</button>
        </div>
        <div class="h-full overflow-auto mx-2 md:mx-6 my-6">
            <div class="bg-white rounded-lg shadow-lg px-2 md:px-6">
                <user-results :results="this.results"></user-results>
            </div>
        </div>
		<div class="flex justify-between pb-6">
			<button v-on:click="prevPage()" class="bg-white mx-2 md:mx-6 px-3 py-2 rounded-lg" v-bind:class="!links.prev ? 'text-gray-300' : ''">
				Previous
			</button>
			<button v-on:click="nextPage()" class="bg-white mx-2 md:mx-6 px-3 py-2 rounded-lg" v-bind:class="!links.next ? 'text-gray-500' : ''">
				Next
			</button>
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
			links: {},
			currentPage: 1,
        }
    },
    methods: {
        fetch(page) {
			console.log('from fetch: ' + page)
            axios.get('api/user?page=' + page, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                params: {
                    'search': this.search,
                }
            }).then(response => {
				console.log(response.data.links)
                this.results = response.data.data
				this.links = response.data.links
            })
        },
		nextPage() {
			if (this.links.next != null) {
				this.currentPage += 1
				this.fetch(this.currentPage)
				console.log(this.currentPage)
			}
		},
		prevPage() {
			if (this.links.prev != null) {
				this.currentPage -= 1
				this.fetch(this.currentPage)
			}
		}
    },
    watch: {
        search() {
            this.fetch()
        }
    },
    mounted() {
        this.fetch()
    }
}
</script>
