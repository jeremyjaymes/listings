<template>
    <div class="listing flex flex-col sm:flex-row">
        <div class="detail sm:w-1/3 sm:pr-6 sm:py-6">
            <p class="text-xl font-bold">{{ listing.name }}</p>
            <address class="text-lg not-italic">
                <span class="block">{{ listing.street_address }}</span>
                <span class="inline-block">{{ listing.city }}, {{ listing.state_name }},
                                {{ listing.zip }}</span>
            </address>
            <div class="text-md mt-4">
                <h3 class="text-gray-500 uppercase tracking-wide font-bold text-sm lg:text-sm mt-10">Contact</h3>
                <span class="block">{{ listing.website }}</span>
                <span class="block">{{ listing.company_email }}</span>
                <span class="block">{{ listing.phone }}</span>
            </div>
            <h3 class="text-gray-500 uppercase tracking-wide font-bold text-sm lg:text-sm mt-10">Capabilities</h3>
        </div>
        <div class="description sm:w-2/3 sm:border-l pl-8 py-6">
            <p class="text-lg">{{ listing.description }}</p>
            <button v-if="listing.company_email" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-3
                 border border-gray-400 rounded shadow my-4">Send Email</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['listing']
    }
</script>
