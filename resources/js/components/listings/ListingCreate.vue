<template>
    <div>
        <button v-if="!addListing" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4
                border-blue-700
        hover:border-blue-500 rounded" @click.prevent="add">
            Add A Listing
        </button>
        <transition name="fade">
            <form v-if="addListing" id="createListing" class="text-left mt-4 mb-8">
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
            leading-tight focus:outline-none focus:shadow-outline" id="description" v-model="description"
                              :maxlength="300"></textarea>
                    <p class="text-sm text-gray-400 my-0">Characters: {{ characters }}</p>
                </div>
                <div class="flex items-center">
                    <div class="flex-1 px-4 py-2">
                        <label for="category">Select Category</label>
                        <select id="category"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                leading-tight focus:outline-none focus:shadow-outline" v-model="category_id">
                            <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                        </select>
                    </div>
                    <div class="flex-1 px-4 py-2">
                        <label for="tags">Enter Tags</label>
                        <tags-input id="tags" element-id="tags"
                                    wrapper-class='bg-white shadow appearance-none border rounded w-full text-gray-700
                leading-tight focus:outline-none focus:shadow-outline px-2'
                                    v-model="tagsArray"
                                    :existing-tags="tags"
                                    :typeahead="true"></tags-input>
                    </div>
                    <div class="flex-1 px-4 py-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="contact-email">
                            Contact Email
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                leading-tight focus:outline-none focus:shadow-outline" id="contact-email" type="text"
                               v-model="contact_email"
                               placeholder="USA Manufacturing">
                    </div>
                </div>
                <street-address :address="address" :states="states"></street-address>
                <div class="px-4 py-4">
                    <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4
                border-blue-700 hover:border-blue-500 rounded" @click.prevent="create">Submit Listing</button>
                    <button class="px-2 text-gray-500" @click="addListing = false">Cancel</button>
                </div>
            </form>
        </transition>
    </div>
</template>

<script>
    import StreetAddress from "../forms/Address";
    import TagsInput from '@voerro/vue-tagsinput';

    export default {
        props: ['states', 'categories', 'tags'],

        components: {
            StreetAddress,
            TagsInput
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
                category_id: null,
                tagsArray: [],
                existingTags: [],
                contact_email: null,
                addListing: false,
                characters: 300
            }
        },
        mounted() {
            this.tags.forEach(this.formatTags);
        },
        watch: {
            description: function() {

                const textarea = document.getElementById("description");

                textarea.addEventListener("input", event => {
                    const target = event.currentTarget;
                    const maxLength = target.getAttribute("maxlength");

                    this.characters = maxLength - target.value.length;
                });
            }
        },
        methods: {
            formatTags: function(item, index, arr) {
                arr[index] = {key: item, value:item}

                this.existingTags = arr;
            },
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
                    tagsArray: this.tagsArray,
                    category_id: this.category_id,
                }
                axios.post('/listings', request).then( resp => {
                    this.$toasted.show(resp.data.message, {
                        theme: "",
                        position: "top-center",
                        className: "bg-green text-white rounded-full",
                        type: "success",
                        duration: 5000
                    });
                    this.addListing = false;
                }).catch( err => (
                    console.log(err)
                ))
            }
        }
    }
</script>
<style lang="scss">
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
    .tags-input input {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        width: 100%;
    }
</style>
