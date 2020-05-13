<template>
    <div>
        <div v-for="listing in listings"
             class="border-b border-gray-300 rounded-sm py-8 px-3 mb-2 w-full flex flex-wrap justify-between
        hover:bg-gray-200 box-shadow">
            <div class="flex flex-no-wrap w-full md:w-3/4 flex-col md:flex-row">
                <div class="flex md:w-1/2">
                    <div class="listing_detail">
                        <p class="text-xl font-bold text-gray-600">{{ listing.name }}</p>
                        <address class="text-md not-italic">
                            <span class="block">{{ listing.street_address }}</span>
                            <span class="inline-block">{{ listing.city }}, {{ listing.state_name }},
                                {{ listing.zip }}</span>
                            <span class="inline-block"></span>
                        </address>
                    </div>
                </div>
                <div class="tags">
                    <span class="bg-white hover:bg-gray-100 text-gray-800 text-sm font-semibold
                    py-1 px-2 border border-gray-400 rounded" v-for="tag in listing.tags">{{ tag.name }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['listings', 'tags']
    }
</script>
