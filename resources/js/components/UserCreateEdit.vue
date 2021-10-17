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
                    <label class="w-32 py-2 px-2">Name: </label><input name="name" type="text" class="w-full rounded-xl bg-gray-200 border-none px-4 py-2" v-model="user.name">
                </div>
                <p v-if="errors.name" class="px-32 text-red text-xs">{{ errors.name.join(',') }}</p>
                <div class="flex">
                    <label class="w-32 py-2 px-2">Email: </label><input type="text" class="w-full rounded-xl bg-gray-200 border-none px-4 py-2" v-model="user.email">
                </div>
                <p v-if="errors.email" class="px-32 text-red text-xs">{{ errors.email.join(',') }}</p>
                <div class="flex">
                    <label class="w-32 py-2 px-2">Phone: </label><input type="text" class="w-full rounded-xl bg-gray-200 border-none px-4 py-2" v-model="user.phone">
                </div>
                <p v-if="errors.phone" class="px-32 text-red text-xs">{{ errors.phone.join(',') }}</p>
                <div class="flex">
                    <label class="w-32 py-2 px-2">Company: </label>
					<select v-model="selectedCompany" class="w-full bg-gray-200 rounded-lg border-none px-4 py-2">
						<option v-for="item in companies" :value="item.id">{{ item.name }}</option>
					</select>
                </div>
                <p v-if="errors.company_id" class="px-32 text-red text-xs">{{ errors.company_id.join(',') }}</p>
                <div class="flex">
                    <label class="w-32 py-2 px-2">Website: </label><input type="text" class="w-full rounded-xl bg-gray-200 border-none px-4 py-2" v-model="user.website">
                </div>
                <p v-if="errors.website" class="px-32 text-red text-xs">{{ errors.website.join(',') }}</p>
                <button @click="createUpdate(buttonType)" class="w-28 bg-gray-200 py-3 text-green text-sm font-bold rounded-xl">Submit</button>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: [
		'userId',
        'buttonType',
		'companies',
	],
    data() {
        return {
            user: {},
            errors: {},
			selectedCompany: Number
        }
    },
	methods: {
        fetchUser() {
            if (this.buttonType === 'edit')
            axios.get('/api/user/' + this.userId, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                }
            }).then(response => {
                this.user = response.data
				this.selectedCompany = this.user.companyId
            })
        },
        createUpdate() {
            var inputData = {
                'name': this.user.name,
                'email': this.user.email,
                'phone': this.user.phone,
                'website': this.user.website,
                'company_id': this.selectedCompany
            }

            if (this.buttonType === 'add') {
                axios.post('/api/user/', inputData).then(response => {
                    this.errors = {}
                    alert(response.data.message)
                }).catch(error => {
                    this.errors = error.response.data.errors
                })
            }

            if (this.buttonType === 'edit') {
                axios.put('/api/user/' + this.userId, inputData).then(response => {
                    alert(response.data.message)
                })
            }
        },
	},
    mounted() {
        this.fetchUser()
    }
}

</script>
