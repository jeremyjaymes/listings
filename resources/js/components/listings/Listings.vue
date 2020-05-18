<template>
    <div>
        <div v-for="listing in listings" class="py-6 px-6 mb-8 w-full flex flex-wrap justify-between bg-white
        hover:bg-gray-200 box-max-w-sm rounded shadow-lg">
            <div class="flex flex-no-wrap w-full flex-col md:flex-row">
                <div class="bg-gray-300 rounded-full h-16 w-16 flex items-center justify-center mr-6 -mx-12">
                    <span class="text-2xl">{{ badge(listing.name) }}</span>
                </div>
                <div class="md:w-3/4 listing_detail">
                    <h2 class="text-xl font-semibold text-gray-700">
                        <a :href="/listings/ + listing.id">
                            {{ listing.name }}
                        </a>
                    </h2>
                    <p class="text-md mt-2">{{ listing.state_name }}</p>
                    <p v-if="listing.phone && listing.display_contact === 1" class="text-md mt-2">
                        {{ listing.phone }}
                    </p>
                    <p v-if="listing.website" class="text-md">
                        <a class="text-blue-300" :href="listing.website">{{ listing.website }}</a>
                    </p>
                </div>
                <div class="tags md:w-1/4 text-right">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1
                    text-sm font-semibold text-gray-700 mr-2" v-for="tag in listing.tags">
                        #{{ tag.name }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['listings', 'tags'],

        methods: {
            badge: function(value) {
                return value.substring(0,1)
            }
        }
    }
</script>
