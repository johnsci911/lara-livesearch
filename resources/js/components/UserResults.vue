<template>
	<div class="flex flex-col">
		<div class="sticky flex flex-row top-0 py-2 border-b bg-white">
			<div class="w-10 px-2 py-2 text-left text-blue text-xs md:text-sm"># </div>
			<div class="w-48  px-2 py-2 text-left text-gray-600 uppercase text-xs md:text-sm">Customer</div>
			<div class="hidden md:block w-48 px-2 py-2 text-left text-gray-600 uppercase text-xs md:text-sm">Phone</div>
			<div class="hidden md:block w-48 px-2 py-2 text-left text-gray-600 uppercase text-xs md:text-sm">Website</div>
			<div class="w-48 px-2 py-2 text-left text-gray-600 uppercase text-xs md:text-sm">Company Name</div>
			<div class="w-48 px-2 py-2 text-left text-gray-600 uppercase text-xs md:text-sm">Status</div>
			<div class="hidden md:block w-48 px-2 pt-2 pb-2 text-left text-gray-600 uppercase text-xs md:text-sm">Actions</div>
		</div>
		<div v-for="user in results" :key="user.id" class="flex border-b">
			<div class="w-10 px-2 py-2 text-left text-xs md:text-sm">{{ user.id }}</div>
			<div class="w-48 px-2 py-2 text-left text-xs md:text-sm">{{ user.name }}</div>
			<div class="w-48 hidden md:block px-2 py-2 text-left">{{ user.phone }}</div>
			<div class="hidden md:block w-48 text-left px-2 py-2">{{ user.website }}</div>
			<div class="w-48 text-left px-2 py-2 text-xs md:text-sm">{{ user.company }}</div>
			<div class="w-48 text-left text-xs md:text-sm px-2 py-2">
				<div v-bind:class="user.statusClass" class="text-white text-center text-xxs md:text-xs font-bold uppercase leading-none rounded-lg w-20 md:w-28 h-7 py-2 px-4">
					{{ user.status }}
				</div>
			</div>
			<div class="hidden md:block w-48 text-left px-2 py-2">
				<div class="flex space-x-2">
					<button class="bg-gray-200 px-2 py-2 text-gray-600 rounded-lg">
						<svg class="w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
						</svg>
					</button>
					<button class="bg-gray-200 px-2 py-2 text-gray-600 rounded-lg">
						<svg class="w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
						</svg>
					</button>
					<button class="bg-gray-200 px-2 py-2 text-gray-600 rounded-lg">
						<svg class="w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
						</svg>
					</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
    props: [
        'results',
    ],
    data() {
        return {

        }
    },
    computed: {
        showResult() {
            if (this.results.length >= 1) {
                return this.results
            }
        }
    }
}
</script>
