<template>
    <div>
        <button class="bg-blue-500 hover:bg-blue-700 text-xl text-white font-bold py-2 px-4 rounded"
                @click.prevent="add">
            Add A Listing
        </button>
        <transition name="fade">
            <form v-if="addListing" id="createListing" class="text-left mt-4">
                <div class="px-4 py-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Business Name
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
            leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" v-model="name"
                           placeholder="USA Manufacturing">
                </div>
                <div class="px-4 py-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                        Describe Your Business
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
            leading-tight focus:outline-none focus:shadow-outline" id="description" v-model="description"></textarea>
                </div>
                <div class="px-4 py-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="contact-email">
                        Contact Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
            leading-tight focus:outline-none focus:shadow-outline" id="contact-email" type="text"
                           v-model="contact_email"
                           placeholder="USA Manufacturing">
                </div>
                <street-address :address="address" :states="states"></street-address>
                <button @click.prevent="create">Create Listing</button>
            </form>
        </transition>

    </div>
</template>

<script>
    import StreetAddress from "../forms/Address";
    export default {
        props: ['states'],
        components: {
            StreetAddress
        },

        data: function() {
            return {
                name: '',
                description: '',
                address: {
                    street_address: '',
                    city: '',
                    state_id: null,
                    zip: null
                },
                contact_email: null,
                addListing: false
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            add: function() {
                (this.addListing) ? this.addListing = false : this.addListing = true;
            },
            create: function() {
                let request = {
                    name: this.name,
                    description: this.description,
                    street_address: this.address.street_address,
                    city: this.address.city,
                    state_id: this.address.state_id,
                    zip: this.address.zip,
                    contact_email: this.contact_email,
                    tag_id: 1,
                }
                axios.post('/listings', request).then( resp => (
                    console.log(resp)
                )).catch( err => (
                    console.log(err)
                ))
            }
        }
    }
</script>
<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
