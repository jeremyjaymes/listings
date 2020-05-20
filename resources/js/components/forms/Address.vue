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
                <div class="relative">
                    <select id="state" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700
                py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            v-model="input.state_id">
                        <option v-for="state in states" :value="state.id">{{ state.name }}</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
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
