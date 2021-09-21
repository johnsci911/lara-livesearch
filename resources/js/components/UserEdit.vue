<template>
	<div class="mx-2 md:mx-6 my-6">
		<div class="flex flex-row px-4 py-6 bg-white shadow-lg rounded-lg">
			<div class="flex-none mx-0 md:mx-2 pr-4 border-r">
				<a href="#">
					<img src="https://gravatar.com/avatar/7a3e469433f289c6f0d3cc98519e8f54?s=200&amp;d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-16.png" alt="avatar" class="w-14 h-14 rounded-xl">
				</a>
			</div>
			<div class="md:w-full flex flex-col justify-between px-3 space-y-4">
                <div class="flex">
                    <label class="w-32 py-2 px-2">Name: </label><input type="text" class="w-full rounded-xl bg-gray-200 border-none px-4 py-2" v-model="user.name">
                </div>
                <div class="flex">
                    <label class="w-32 py-2 px-2">Email: </label><input type="text" class="w-full rounded-xl bg-gray-200 border-none px-4 py-2" v-model="user.email">
                </div>
                <div class="flex">
                    <label class="w-32 py-2 px-2">Phone: </label><input type="text" class="w-full rounded-xl bg-gray-200 border-none px-4 py-2" v-model="user.phone">
                </div>
                <div class="flex">
                    <label class="w-32 py-2 px-2">Company: </label><input type="text" class="w-full rounded-xl bg-gray-200 border-none px-4 py-2 text-gray-400" v-model="user.company" disabled>
                </div>
                <div class="flex">
                    <label class="w-32 py-2 px-2">Website: </label><input type="text" class="w-full rounded-xl bg-gray-200 border-none px-4 py-2" v-model="user.website">
                </div>
                <button @click="update()" class="w-28 bg-gray-200 py-3 text-green text-sm font-bold rounded-xl">Submit</button>
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
        },
        update() {
            axios.put('/api/user/' + this.userId, {
                'name': this.user.name,
                'email': this.user.email,
                'phone': this.user.phone,
                'website': this.user.website,
            }).then(response => {
                alert(response.data.message)
            })
        },
	},
    mounted() {
        this.fetchUser()
    }
}

</script>
