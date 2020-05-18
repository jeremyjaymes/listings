<template>
    <div>
        <button v-if="!addListing" class="bg-blue-600 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4
                border-blue-900
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
                           placeholder="USA Manufacturing" @change="removeError('name')">
                    <p v-for="error in errors" v-if="error.name" class="text-red-500 text-xs italic">{{ error.name
                    }}</p>
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
                        <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Select Category</label>
                        <select id="category"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                leading-tight focus:outline-none focus:shadow-outline" @change="removeError('category')"
                                v-model="category_id">
                            <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                        </select>
                        <p v-for="error in errors" v-if="error.category" class="text-red-500 text-xs italic">{{
                            error.category
                            }}</p>
                    </div>
                    <div class="flex-1 px-4 py-2">
                        <label for="tags" class="block text-gray-700 text-sm font-bold mb-2">Enter Tags</label>
                        <tags-input id="tags" element-id="tags"
                                    wrapper-class='bg-white shadow appearance-none border rounded w-full text-gray-700
                leading-tight focus:outline-none focus:shadow-outline px-2'
                                    v-model="tagsArray"
                                    :existing-tags="tags"
                                    :add-tags-on-blur="true"
                                    :typeahead="true"></tags-input>
                    </div>
                    <div class="flex-1 px-4 py-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="contact-email">
                           Personal Contact Email
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                leading-tight focus:outline-none focus:shadow-outline" id="contact-email" type="text"
                               v-model="contact_email"
                               placeholder="hello@example.org" @change="removeError('email')">
                        <p v-for="error in errors" v-if="error.email" class="text-red-500 text-xs italic">{{
                            error.email
                            }}</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="flex-1 px-4 py-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="company-email">
                            Company Email
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                leading-tight focus:outline-none focus:shadow-outline" id="company-email" type="text"
                               v-model="company_email"
                               placeholder="hello@example.org">
                        <p class="text-gray-600 text-xs italic">Displayed with listing.</p>
                    </div>
                    <div class="flex-1 px-4 py-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                            Phone
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                leading-tight focus:outline-none focus:shadow-outline" id="phone" type="text"
                               v-model="phone"
                               placeholder="(222) 333-4444">
                    </div>
                    <div class="flex-1 px-4 py-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="website">
                            Website
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                leading-tight focus:outline-none focus:shadow-outline" id="website" type="text"
                               v-model="website"
                               placeholder="https://example.org">
                    </div>
                </div>
                <street-address :address="address" :states="states"></street-address>
                <div class="px-4 py-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="display">
                        <input class="mr-2 leading-tight" id="display" type="checkbox" v-model="display_contact">
                        <span class="text-sm">
                            Display contact info with my listing. (Company Email, Phone)
                            <span class="font-normal italic">
                                 We will not share your personal contact email.
                            </span>
                        </span>
                    </label>
                </div>
                <div class="px-4 py-4">
                    <button class="bg-blue-600 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4
                border-blue-900 hover:border-blue-500 rounded" @click.prevent="create">Submit Listing</button>
                    <button class="px-2 text-white" @click="addListing = false">Cancel</button>
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
                company_email: null,
                phone: null,
                website: null,
                display_contact: false,
                addListing: false,
                characters: 300,
                errors: []
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
            removeError: function(value) {
                if (!this.errors) return;
                console.log(value)
                this.errors = this.errors.filter( (e) => {
                    console.log(Object.keys(e))
                    return Object.keys(e) != value
                })
            },
            validate: function() {
                if (this.name && this.category_id) {
                    return true
                }

                this.errors = [];

                if (!this.name) {
                    this.errors.push({'name': 'Name required.'})
                }

                if (!this.category_id) {
                    this.errors.push({'category': 'Category required.'})
                }

                if (!this.contact_email) {
                    this.errors.push({'email': 'Please enter a contact email.'})
                }
            },
            create: function() {
                this.validate();
                if (this.errors.length > 0) return;

                let request = {
                    name: this.name,
                    description: this.description,
                    street_address: this.address.street_address,
                    city: this.address.city,
                    state_id: this.address.state_id,
                    zip: this.address.zip,
                    contact_email: this.contact_email,
                    company_email: this.company_email,
                    phone: this.phone,
                    website: this.website,
                    display_contact: this.display_contact,
                    tagsArray: this.tagsArray,
                    category_id: this.category_id,
                }
                axios.post('/listings', request).then( resp => {
                    console.log('submit')
                    this.$toasted.show(resp.data.message, {
                        theme: "",
                        position: "top-center",
                        className: "bg-green text-white rounded-full",
                        type: "success",
                        duration: 5000
                    });
                    this.addListing = false;
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
