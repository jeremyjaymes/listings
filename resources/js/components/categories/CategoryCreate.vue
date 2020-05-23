<template>
    <div>
        <div class="px-4 py-2">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Category Name
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
        leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" v-model="name"
                   placeholder="">
        </div>
        <div class="px-4 py-4">
            <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4
            border-blue-700 hover:border-blue-500 rounded" @click.prevent="create">Create</button>
        </div>
        <span class="inline-block bg-gray-300 rounded-full py-2 px-4 m-1" v-for="category in categoriesArray">
                {{ category.name }}
        </span>
    </div>
</template>

<script>
    export default {
        props: ['categories'],

        data() {
            return {
                categoriesArray: this.categories,
                name: '',
            }
        },

        methods: {
            create: function() {
                let request ={
                    name: this.name,
                    slug: this.name
                }
                axios.post('/categories', request).then( resp => {
                    this.$toasted.show(resp.data.message, {
                        theme: "",
                        position: "top-center",
                        className: "bg-green text-white rounded-full",
                        type: "success",
                        duration: 5000
                    });

                    this.categoriesArray.push(resp.data.category)
                    this.name = ''
                }).catch( err => (
                    this.$toasted.show(err, {
                        theme: "",
                        position: "top-center",
                        className: "bg-red text-white rounded-full",
                        type: "success",
                        duration: 5000
                    })
                ))
            }
        }
    }
</script>
