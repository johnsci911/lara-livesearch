<template>
    <table class="table-fixed w-full my-2">
        <thead class="sticky top-0 bg-white">
            <tr class="text-sm text-left border-b">
                <th class="pt-4 pb-2 w-20 text-blue"># </th>
                <th class="pt-4 pb-2 mx-4 text-gray-600 uppercase">Customer</th>
                <th class="pt-4 pb-2 mx-4 text-gray-600 uppercase">Phone</th>
                <th class="pt-4 pb-2 mx-4 text-gray-600 uppercase">Website</th>
                <th class="pt-4 pb-2 mx-4 text-gray-600 uppercase">Company Name</th>
                <th class="pt-4 pb-2 mx-4 text-gray-600 uppercase">Status</th>
                <th class="pt-4 pb-2 mx-4 text-gray-600 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in results" :key="user.id" class="border-b">
                <td class="py-4">{{ user.id }}</td>
                <td class="py-4">{{ user.name }}</td>
                <td class="py-4">{{ user.phone }}</td>
                <td class="py-4">{{ user.website }}</td>
                <td class="py-4">{{ user.company }}</td>
                <td class="py-4">
                    <div v-bind:class="user.statusClass" class="text-white text-center text-xs font-bold uppercase leading-none rounded-lg w-22 h-7 py-2 px-4">
                        {{ user.status }}
                    </div>
                </td>
                <td class="py-4">
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
                </td>
            </tr>
        </tbody>
    </table>
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
