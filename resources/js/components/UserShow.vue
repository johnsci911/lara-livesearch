<template>
	<div class="mx-2 md:mx-6 my-6">
		<div class="flex flex-row px-4 py-6 bg-white shadow-lg rounded-lg">
			<div class="flex-none mx-0 md:mx-2 pr-4 border-r">
				<a href="#">
					<img src="https://gravatar.com/avatar/7a3e469433f289c6f0d3cc98519e8f54?s=200&amp;d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-16.png" alt="avatar" class="w-14 h-14 rounded-xl">
				</a>
			</div>
			<div class="md:w-full flex flex-col justify-between px-3 space-y-2">
				<h4 class="text-xl font-semibold mt-2 md:mt-0">
                    {{ user.name }}
                </h4>
                <p class="text-gray-400">{{ user.email }}</p>
                <p class="text-gray-600 text-sm">{{ user.phone }}</p>
                <p class="text-gray-600 text-sm font-bold">{{ user.company }} - {{ user.website }}</p>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: [
		'userId'
	],
    data() {
        return {
            user: {}
        }
    },
	methods: {
        fetchUser() {
            axios.get('/api/user/' + this.userId, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                }
            }).then(response => {
                this.user = response.data
            })
        }
	},
    mounted() {
        this.fetchUser()
    }
}

</script>
