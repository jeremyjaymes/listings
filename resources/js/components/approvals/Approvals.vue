<template>
    <div>
        <div v-for="listing in listings"
             class="border-b border-gray-300 rounded-sm py-8 px-3 mb-2 w-full flex flex-wrap justify-between
        hover:bg-gray-200 box-shadow">
            <div class="flex flex-no-wrap w-full flex-col md:flex-row">
                <div class="flex md:w-1/2">
                    <div class="listing_detail">
                        <p class="text-xl font-bold">{{ listing.name }}</p>
                        <address class="text-lg">
                            <span class="block">{{ listing.street_address }}</span>
                            <span class="inline-block">{{ listing.city }}</span>
                            <span class="inline-block"></span>
                        </address>
                    </div>
                </div>
                <div class="md:w-1/4">

                </div>
                <div class="md:w-1/4 text-right">
                    <label class="md:w-2/3 block text-gray-500">
                        <input :id="'approve-'+listing.id" class="mr-2 leading-tight" type="checkbox"
                        @change="approve(listing.id)">
                        <span class="text-sm">
                            Approve
                        </span>
                    </label>
                    <button :id="'deny-'+listing.id" class="text-red-600" @click="remove(listing.id)">
                        Deny</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['listings'],

        methods: {
            approve: function(id) {
                axios.post('/approvals/' + id).then(resp => {
                    this.$toasted.show(resp.data.message, {
                        theme: "",
                        position: "top-center",
                        className: "bg-green text-white rounded-full",
                        type: "success",
                        duration: 5000
                    });
                    location.reload();
                }).catch(err => {
                    this.$toasted.show(err, {
                        theme: "",
                        position: "top-center",
                        className: "bg-red text-white rounded-full",
                        duration: 5000
                    })
                })
            },
            remove: function(id) {
                axios.delete('/listings/' + id).then(resp => {
                    location.reload()
                }).catch( err => (
                    this.$toasted.show(err, {
                        theme: "",
                        position: "top-center",
                        className: "bg-red text-white rounded-full",
                        duration: 5000
                    })
                ));
            }
        }
    }
</script>
