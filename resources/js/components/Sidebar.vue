<template>
    <div>
        <h3 class="text-gray-500 uppercase tracking-wide font-bold text-sm lg:text-sm">{{ title }}</h3>
        <ul class="mt-4 text-gray-600">
            <li v-for="category in categories">
                <a :href="'?category=' + category.slug">{{ category.name}}</a>
            </li>
        </ul>
    </div>
</template>
<script>
    export default {
        props: ['categories', 'title']
    }
</script>
