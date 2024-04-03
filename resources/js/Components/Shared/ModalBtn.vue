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

        openFunction: {
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
            @click="openFunction">
            {{ btnText }}
        </button>
    
        <a
            v-else
            @click="openFunction">
            {{ btnText }}
        </a>
    </template>
    <i 
        :class="['fas', icon, ...classes]" 
        type="button"
        v-else
        @click="openFunction"></i>
</template>