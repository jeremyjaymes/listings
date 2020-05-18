<template>
    <div>
        <div class="px-4 py-2">
            <label for="street" class="block text-gray-700 text-sm font-bold mb-2">Street Address</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
            leading-tight focus:outline-none focus:shadow-outline" id="street" type="text"
                   v-model="input.street_address">
        </div>
        <div class="flex items-center">
            <div class="flex-1 px-4 py-2">
                <label for="city" class="block text-gray-700 text-sm font-bold mb-2">City</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
            leading-tight focus:outline-none focus:shadow-outline" id="city" type="text"
                       v-model="input.city">
            </div>
            <div class="flex-1 px-4 py-2">
                <label for="state" class="block text-gray-700 text-sm font-bold mb-2">State</label>
                <select id="state" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
            leading-tight focus:outline-none focus:shadow-outline" v-model="input.state_id">
                    <option v-for="state in states" :value="state.id">{{ state.name }}</option>
                </select>
            </div>
            <div class="flex-1 px-4 py-2">
                <label for="zip" class="block text-gray-700 text-sm font-bold mb-2">Zip</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
            leading-tight focus:outline-none focus:shadow-outline" id="zip" type="text"
                       v-model="input.zip">
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['address', 'states'],

        data: function() {
            return {
                input: this.address,
            }
        },
        mounted() {
            console.log('address up')
        }
    }
</script>
