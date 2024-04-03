<script setup>
    const emit = defineEmits(['close']);
    defineProps({
        message: {
            type: String,
            default: '',
        },

        type: {
            type: String,
            default: 'alert-success',
        },

        closable: {
            type: Boolean,
            default: true,
        },
    });
    const emitClose = () => {
        emit('close');
    };
</script>
<template>
    <div 
        class="alert alert-dismissible fade show" 
        :class="[type]">
        {{ message }}
        <button 
            v-if="closable"
            type="button" 
            class="btn-close" 
            data-bs-dismiss="alert" 
            aria-label="Close"
            @click="emitClose"></button>
    </div>
</template>