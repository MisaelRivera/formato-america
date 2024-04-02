<script setup>
    import '@fortawesome/fontawesome-free/css/all.css';
    const props = defineProps({
        btnStyle: {
            type: Boolean,
            default: true,
        },

        btnColor: {
            type: String,
            default: 'btn-success'
        },

        btnText: {
            type: String,
            default: '',
        },

        isIcon: {
            type: Boolean,
            default: false,
        },

        openFuction: {
            type: Function,
            default: function () {},
        },

        classes: {
            type: Array,
            default: [],
        },

        icon: {
            type: String,
            default: '',
        },

        target: {
            type: String,
            required: true,
        },
    })
</script>
<template>
    <template v-if="!isIcon">
        <button 
            v-if="btnStyle"
            type="button" 
            :class="['btn', btnColor, ...classes]"
            @click="openFuction">
            {{ btnText }}
        </button>
    
        <a
            v-else
            data-bs-toggle="modal"
            :data-bs-target="`#${target}`">
            {{ btnText }}
        </a>
    </template>
    <i 
        :class="['fas', icon, ...classes]" 
        type="button"
        v-else
        data-bs-toggle="modal"
        :data-bs-target="`#${target}`"></i>
</template>