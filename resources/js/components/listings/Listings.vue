<template>
    <div>
        <div v-for="listing in listings">
            <h3>{{listing.name}}</h3>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['listings']
    }
</script>
