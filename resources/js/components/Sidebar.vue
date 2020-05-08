<template>
    <div>
        <h3 class="text-gray-500 uppercase tracking-wide font-bold text-sm lg:text-sm">Categories</h3>
        <ul class="mt-4 text-gray-600">
            <li v-for="category in categories">
                {{ category.name}}
            </li>
        </ul>
    </div>
</template>
<script>
    export default {
        props: ['categories']
    }
</script>
