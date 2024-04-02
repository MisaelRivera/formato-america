<script setup>
    import '@fortawesome/fontawesome-free/css/all.css';
    import { Link } from '@inertiajs/vue3';
    defineProps({
        isLink: {
            type: Boolean,
            default: false,
        },

        url: {
            defualt: null
        },

        size: {
            type: String,
            default: 'lg',
        },

        classes: {
            type: Array,
            default: [],
        },

        event: {
            type: Function,
            default: function () {}
        },
    });
</script>
<template>
    <Link 
        v-if="isLink"
        :href="url"
        class="link">
        <i :class="['fas', 'fa-plus', 'add', size, ...classes]"></i>
    </Link>
        <i :class="['fas', 'fa-plus', 'add', size]" v-else @click="event"></i>
</template>
<style>
    .link {
        text-decoration: none;
    }

    .add {
        background: rgb(125, 207, 125);
        border-radius: 50%;
        color: white;
        font-weight: bold;
        text-align: center;
    }

    .md {
        font-size: 2rem;
        height: 2.1rem;
        width: 2.25rem;
    }

    .lg {
        font-size: 3rem;
        height: 3.25rem;
        width: 3.25rem;
    }
</style>