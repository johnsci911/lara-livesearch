<template>
	<div>
        <div class="flex flex-col md:flex-row md:justify-between bg-white border-t shadow-lg">
            <div class="flex">
                <div class="px-4 py-5 border-r">
                    <p class="text-gray-600 text-base font-bold">Contacts</p>
                </div>
                <div class="w-full md:w-96 px-4 py-2 relative">
                    <div class="absolute align-middle py-4 items-center mr-2 right-4">
                        <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input v-model="search" type="search" placeholder="Search" class="w-full rounded-xl bg-gray-200 border-none px-4 py-3 placeholder-gray-900">
                </div>
            </div>
            <button class="bg-gray-200 mx-4 my-2 px-4 py-3 text-blue font-bold rounded-lg">Add Contact</button>
        </div>
        <div class="mx-2 md:mx-6 my-6">
            <div class="bg-white rounded-lg shadow-lg px-2 md:px-6">
                <user-results :results="this.results"></user-results>
            </div>
        </div>
		<div class="flex justify-between pb-6">
			<button v-on:click="prevPage()" class="bg-white mx-2 md:mx-6 px-3 py-2 rounded-lg" v-bind:class="!links.prev ? 'text-gray-300' : ''">
				Previous
			</button>
			<button v-on:click="nextPage()" class="bg-white mx-2 md:mx-6 px-3 py-2 rounded-lg" v-bind:class="!links.next ? 'text-gray-300' : ''">
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
