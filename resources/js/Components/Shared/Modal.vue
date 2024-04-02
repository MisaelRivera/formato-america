<script setup>
    const props = defineProps({

        hasActionButton: {
            type: Boolean,
            default: false,
        },

        closeButtonText: {
            type: String,
            default: 'Cerrar',
        },

        closeButtonColor: {
            type: String,
            default: 'btn-secondary',
        },

        closeButtonFunction: {
            type: Function,
            default: function () {},
        },

        actionButtonText: {
            type: String,
            default: '',
        },

        actionButtonColor: {
            type: String,
            default: 'btn-primary',
        },

        actionButtonFunction: {
            type: Function,
            default: () => function () {}
        },

        size: {
            type: String,
            default: '',
        },

        target: String,

        title: String,

    });
</script>
<template>

    <!-- Modal -->
    <div 
        class="modal fade" 
        :id="target" 
        tabindex="-1" 
        aria-hidden="true">
        <div :class="['modal-dialog', size]">
            <div class="modal-content">
                <div class="modal-header">
                    <slot name="header"></slot>
                    <button 
                        type="button" 
                        class="btn-close" 
                        aria-label="Close"
                        @click="closeButtonFunction"></button>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
                <div class="modal-footer">
                    <button 
                        type="button" 
                        :class="['btn', closeButtonColor]" 
                        @click="closeButtonFunction">
                        {{ closeButtonText }}
                    </button>
                    <button 
                        v-if="hasActionButton"
                        type="button" 
                        :class="['btn', actionButtonColor]"
                        @click="actionButtonFunction">
                        {{ actionButtonText }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>