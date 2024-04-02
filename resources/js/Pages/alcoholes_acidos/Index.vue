<script setup>
    import { ref } from 'vue';
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    const form = ref({}),
          food = ref([]);
    
    const action = () => {
        console.log(form);
        const formElements = Array.from(form.value.elements);
        formElements.forEach(formElement => console.log(formElement));
        console.log(food.value);
        /*
        const inputNames = formElements.map((formElement) => formElement.name);
        console.log(inputNames);*/
    };
</script>
<template>
    <GuestLayout>
        <h1>Testing</h1>
        <form ref="form">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-4">
                            <label for="name">Name</label>
                            <input 
                                type="text"
                                name="name"
                                class="form-control"
                                id="name"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <label for="age">Age</label>
                            <input 
                                type="number"
                                name="age"
                                class="form-control"
                                id="age"
                                required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <label for="job">Job</label>
                            <input 
                                type="text"
                                name="job"
                                class="form-control"
                                id="job"
                                required>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <button 
                    class="btn btn-primary"
                    @click="action">
                    Click
                </button>
            </div>
        </div>
    </GuestLayout>
</template>