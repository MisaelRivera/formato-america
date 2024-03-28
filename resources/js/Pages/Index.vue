<script setup>
    defineProps({
        title: String,
    });
</script>
<template>
    <h1>{{ title }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <p>Testing the grid</p>
            </div>
        </div>
    </div>
</template>
