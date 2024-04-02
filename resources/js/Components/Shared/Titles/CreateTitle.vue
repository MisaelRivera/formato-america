<script setup>
    import { Link } from '@inertiajs/vue3';
    import Plus from '@/Components/Shared/Icons/Plus.vue';
    const props = defineProps({
        createUrl: {
            type: String,
            default: '',
        },
        title: String,
        defaultUrl: String,
        classes: {
            type: Array,
            default: [],
        },
        event: {
            type: Function,
            default: function () {},
        },
    });
    
</script>
<template>
    <h2 :class="['create-title', ...classes]">
        <Link :href="defaultUrl" class="create-title-link">
            {{ title }}
        </Link>
        <Plus :classes="['ms-2']" size="md" :event="event"/>
    </h2>
</template>
<style>
    .create-title {
        font-size: 1.75rem;
        font-weight: bold;
        color: rgb(8, 70, 13);
    }

    .create-title-link {
        color: inherit;
        text-decoration: none;
    }
</style>
