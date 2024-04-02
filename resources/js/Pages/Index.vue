<script setup>
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    defineProps({
        title: String,
    });
</script>
<template>
    <GuestLayout>
        <h1>{{ title }}</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <p>Testing the grid</p>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
